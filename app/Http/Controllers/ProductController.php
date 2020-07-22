<?php
  
namespace App\Http\Controllers;

use PayPal\Api\Address;
use PayPal\Api\Amount;
use PayPal\Api\BillingInfo;
use PayPal\Api\Cost;
use PayPal\Api\Currency;
use PayPal\Api\Invoice;
use PayPal\Api\InvoiceAddress;
use PayPal\Api\InvoiceItem;
use PayPal\Api\MerchantInfo;
use PayPal\Api\PaymentTerm;
use PayPal\Api\Phone;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\ShippingInfo;
use PayPal\Api\Item;
use PayPal\Api\WebProfile;
use PayPal\Api\ItemList;
use PayPal\Api\InputFields;
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
    private $merchantInfo = [
        'Email' => "sb-woori2690280@business.example.com",
        'FirstName' => "Tom",
        'LastName' => "Clean",
        'BusinessName' => "Tom Clean Servicies, LLC",
        'CountryPhoneCode' => "001",
        'NationalNumber' => "5032141716",
        'Line1' => "1234 Main St.",
        'City' => "Portland",
        'State' => "OR", 
        'PostalCode' => "97217",
        'CountryCode' => "US",
        'BillingEmail' => "sb-1ogav2680859@personal.example.com"
    ];

    public function __construct()
    {
        $paypalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(new OAuthTokenCredential(
                $paypalConfig['client_id'],
                $paypalConfig['secret']
        ));

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

    public function sendInvoice($id)
    {
        $order = Order::with('service')->where('id', $id)->first();       

        $invoice = new Invoice();
        $invoice
            ->setMerchantInfo(new MerchantInfo())
            ->setBillingInfo(array(new BillingInfo()))
            ->setNote("Tom Clean Service Invoice")
            ->setPaymentTerm(new PaymentTerm())
            ->setShippingInfo(new ShippingInfo());

        $invoice->getMerchantInfo()
            ->setEmail($this->merchantInfo['Email'])
            ->setFirstName($this->merchantInfo['FirstName'])
            ->setLastName($this->merchantInfo['LastName'])
            ->setbusinessName($this->merchantInfo['BusinessName'])
            ->setPhone(new Phone())
            ->setAddress(new Address());

        $invoice->getMerchantInfo()->getPhone()
            ->setCountryCode($this->merchantInfo['CountryPhoneCode'])
            ->setNationalNumber($this->merchantInfo['NationalNumber']);

        $invoice->getMerchantInfo()->getAddress()
            ->setLine1($this->merchantInfo['Line1'])
            ->setCity($this->merchantInfo['City'])
            ->setState($this->merchantInfo['State'])
            ->setPostalCode($this->merchantInfo['PostalCode'])
            ->setCountryCode($this->merchantInfo['CountryCode']);

        $billing = $invoice->getBillingInfo();
        $billing[0]
            ->setEmail($order->pay_email);

        $billing[0]->setBusinessName($this->merchantInfo['BusinessName'])
            ->setAdditionalInfo("This is the Tom Clean billing Info")
            ->setAddress(new InvoiceAddress());

        $billing[0]->getAddress()
            ->setLine1($this->merchantInfo['Line1'])
            ->setCity($this->merchantInfo['City'])
            ->setState($this->merchantInfo['State'])
            ->setPostalCode($this->merchantInfo['PostalCode'])
            ->setCountryCode($this->merchantInfo['CountryCode']);

        $items = array();
        $items[0] = new InvoiceItem();
        $items[0]
            ->setName($order->service->name)
            ->setQuantity(1)
            ->setUnitPrice(new Currency());

        $items[0]->getUnitPrice()
            ->setCurrency("USD")
            ->setValue($order->service->price);

        $invoice->setItems($items);        

        $cost = new Cost();
        $cost->setPercent("2");
        $invoice->setDiscount($cost);

        $invoice->getPaymentTerm()
            ->setTermType("NET_45");

        $invoice->getShippingInfo()
            ->setFirstName("Sally")
            ->setLastName("Patient")
            ->setBusinessName("Not applicable")
            ->setPhone(new Phone())
            ->setAddress(new InvoiceAddress());

        $invoice->getShippingInfo()->getPhone()
            ->setCountryCode("001")
            ->setNationalNumber("5039871234");

        $invoice->getShippingInfo()->getAddress()
            ->setLine1($this->merchantInfo['Line1'])
            ->setCity($this->merchantInfo['City'])
            ->setState($this->merchantInfo['State'])
            ->setPostalCode($this->merchantInfo['PostalCode'])
            ->setCountryCode($this->merchantInfo['CountryCode']);

        $invoice->setLogoUrl('https://www.paypalobjects.com/webstatic/i/logo/rebrand/ppcom.svg');

        $request = clone $invoice;

        try {
            $invoice->create($this->apiContext);
            $sendStatus = $invoice->send($this->apiContext);
            $affected = DB::table('orders')
                  ->where('id', $id)
                  ->update(['status' => 3]);
            return Response::json($affected);
            
        } catch (Exception $ex) {
            return Response::json(['status' => 'failed']);
        }

        
    }
}
