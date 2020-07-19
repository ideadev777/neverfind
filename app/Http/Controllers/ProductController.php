<?php
  
namespace App\Http\Controllers;
  
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Redirect,Response;
use DB ;
use Mail;
class ProductController extends Controller
{
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
        return view('list');
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
        $affected = DB::table('orders')
                  ->where('id', $id)
                  ->update(['status' => 3]);
        return Response::json($affected);
    }
}
