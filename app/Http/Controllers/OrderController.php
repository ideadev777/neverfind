<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use DB;
use Illuminate\Http\Request;
use Carbon\Carbon ;
use App\Order ;
class OrderController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
	{
		$services = DB::select('select * from service' );
	 	return view('order', [
			'bgImg' => [ ["order_1","Picture_1"] ],
	 		'services' => $services
	 	]);
	} 
	public function detail($id)
	{
		$services = DB::select('select * from service' );
	 	return view('order', [
			'bgImg' => [ ["order_1","Picture_1"] ],
	 		'services' => $services
	 	]);
	}   
	public function postOrder(Request $req)
	{
		
		$new_order = new Order ;
		$new_order->service_id = $req->input('service-type'); 
		$new_order->name = $req->input('name') ;
		$new_order->status = '0' ;
		$new_order->email = $req->input('email') ;
		$new_order->address = $req->input('address') ;
		$new_order->mobile_number = $req->input('mobilenumber')  ;
		$new_order->pay_email = $req->input('pay-email')  ;
		$new_order->start_date = Carbon::parse($req->input('startDay')) ;
		$new_order->end_date = Carbon::parse($req->input('endDay')) ;
		$new_order->start_time = $req->input('startTime') ;
		$new_order->end_time = $req->input('endTime') ;
		$new_order->save() ;

//		DB::table('orders')->insert($data) ;
		return redirect()->back()->with('success', 1 );
	}
	public function delete($id)
	{
		return redirect()->back()->withInput() ;
	}
}
