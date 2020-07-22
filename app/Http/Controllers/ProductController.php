<?php
  
namespace App\Http\Controllers;

use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\WebProfile;
use PayPal\Api\ItemList;
use PayPal\Api\InputFields;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
  
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Redirect,Response;
use DB ;
use Mail;
use Config;
use URL;
use Session;

class ProductController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        # Main configuration in constructor
        $paypalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(new OAuthTokenCredential(
                $paypalConfig['client_id'],
                $paypalConfig['secret'])
        );

        $this->apiContext->setConfig($paypalConfig['settings']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Order::with('service'))
            ->addColumn('status', 'datatable.status')
            ->addColumn('detail', 'datatable.detail')
            ->addColumn('invoice', 'datatable.invoice')
            ->addColumn('delete', 'datatable.delete')
            ->rawColumns(['status','invoice', 'detail', 'delete'])
            ->addIndexColumn()
            ->make(true);
        }
//        return view('list');
    }

    public function store(Request $request)
    {  
        $productId = $request->id;
        $affected = DB::table('orders')
                  ->where('id', $productId)
                  ->update(['status' => $request->status]);
        $detail = DB::select('select * from orders where id='.$productId);
        $mail = DB::select('select * from mailtemplate where status='.$request->status);
        Mail::raw($mail[0]->content, function($message) use($detail,$mail)
        {
            $message->subject($mail[0]->header);
            $message->from('no-reply@website_name.com', 'Cleaning Service');
            $message->to($detail[0]->email);
        });
        return Response::json($affected);
    }
      
    public function edit($id)
    {   
        $where = array('id' => $id);
        $product  = Order::with('service')->where($where)->first();
        $tmp =  1; 
        return Response::json($product);
    }

    public function changestatus($id)
    {
    }

    public function destroy($id)
    {
        $product = Order::where('id',$id)->delete();
      
        return Response::json($product);
    }

    /*public function sendInvoice($id)
    {
        $affected = DB::table('orders')
                  ->where('id', $id)
                  ->update(['status' => 3]);
        return Response::json($affected);
    }*/

    public function sendInvoice($id)
    {
        # We initialize the payer object and set the payment method to PayPal
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        # We insert a new order in the order table with the 'initialised' status
        $order = Order::with('service')->where('id', $id)->first();

        # We need to update the order if the payment is complete, so we save it to the session
        //Session::put('orderId', $order->getKey());

        # We get all the items from the cart and parse the array into the Item object
        $items = [];
        $items[] = (new Item())
            ->setName($order->service->name)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($order->service->price);

        # We create a new item list and assign the items to it
        $itemList = new ItemList();
        $itemList->setItems($items);

        # Disable all irrelevant PayPal aspects in payment
        $inputFields = new InputFields();
        $inputFields->setAllowNote(true)
            ->setNoShipping(1)
            ->setAddressOverride(0);

        $webProfile = new WebProfile();
        $webProfile->setName(uniqid())
            ->setInputFields($inputFields)
            ->setTemporary(true);

        $createProfile = $webProfile->create($this->apiContext);

        # We get the total price of the cart
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($order->service->price);

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setItemList($itemList)
            ->setDescription('Your transaction description');

        $redirectURLs = new RedirectUrls();
        $redirectURLs->setReturnUrl(URL::to('status'))
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectURLs)
            ->setTransactions(array($transaction));
        $payment->setExperienceProfileId($createProfile->getId());
        $payment->create($this->apiContext);

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirectURL = $link->getHref();
                break;
            }
        }

        # We store the payment ID into the session
        Session::put('paypalPaymentId', $payment->getId());

        if (isset($redirectURL)) {
            return Redirect::away($redirectURL);
        }

        Session::put('error', 'There was a problem processing your payment. Please contact support.');

        return Redirect::to('/home');
    }

    public function getPaymentStatus()
    {
        $paymentId = Session::get('paypalPaymentId');
        $orderId = Session::get('orderId');

        # We now erase the payment ID from the session to avoid fraud
        Session::forget('paypalPaymentId');

        # If the payer ID or token isn't set, there was a corrupt response and instantly abort
        if (empty(Request::get('PayerID')) || empty(Request::get('token'))) {
            Session::put('error', 'There was a problem processing your payment. Please contact support.');
            return Redirect::to('/home');
        }

        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId(Request::get('PayerID'));

        $result = $payment->execute($execution, $this->apiContext);

        # Payment is processing but may still fail due e.g to insufficient funds
        $order = Order::find($orderId);
        $order->status = 'processing';

        if ($result->getState() == 'approved') {

            $invoice = new Invoice();
            $invoice->price = $result->transactions[0]->getAmount()->getTotal();
            $invoice->currency = $result->transactions[0]->getAmount()->getCurrency();
            $invoice->customer_email = $result->getPayer()->getPayerInfo()->getEmail();
            $invoice->customer_id = $result->getPayer()->getPayerInfo()->getPayerId();
            $invoice->country_code = $result->getPayer()->getPayerInfo()->getCountryCode();
            $invoice->payment_id = $result->getId();

            # We update the invoice status
            $invoice->payment_status = 'approved';
            $invoice->save();

            # We also update the order status
            $order->invoice_id = $invoice->getKey();
            $order->status = 'pending';
            $order->save();

            # We insert the suborder (products) into the table
            foreach (Cart::content() as $item) {
                $suborder = new Suborder();
                $suborder->order_id = $orderId;
                $suborder->product_id = $item->id;
                $suborder->price = $item->price;
                $suborder->quantity = $item->qty;
                $suborder->save();
            }

            Cart::destroy();

            Session::put('success', 'Your payment was successful. Thank you.');

            return Redirect::to('/home');
        }

        Session::put('error', 'There was a problem processing your payment. Please contact support.');

        return Redirect::to('/home');
    }
}
