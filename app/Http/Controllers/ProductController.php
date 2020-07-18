<?php
  
namespace App\Http\Controllers;
  
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Redirect,Response;
use DB ;

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
        ->addColumn('change', 'change')
        ->addColumn('action', 'action')
        ->rawColumns(['change','action'])
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
}