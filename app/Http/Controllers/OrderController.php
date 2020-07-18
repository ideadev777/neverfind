<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use DB;
use Illuminate\Http\Request;
use Carbon\Carbon ;
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
		$mail = $req->input('email') ;
		$service_id = $req->input('service-type') ;
		$name = $req->input('name') ;
		$address = $req->input('address') ;
		$mobile = $req->input('mobile-number') ;
		$pay = $req->input('pay-email') ;
		$start_date = $req->input('startDay') ;
		$end_date = $req->input('endDay') ;
		$start_time = $req->input('startTime') ;
		$end_time = $req->input('endTime') ;
		$data=array(
			'service_id' => $service_id,
			'name' => $name, 
			'status'=>'0',
			'email'=>$mail,
			'address'=>$address,
			'mobile_number' => $mobile,
			'pay_email' => $pay,
			'start_date' => Carbon::parse($start_date),
			'end_date' => Carbon::parse($end_date),
			'start_time' => $start_time,
			'end_time' => $end_time
		);
		DB::table('orders')->insert($data) ;
		return redirect()->back()->with('success', 1 );
	}
	public function delete($id)
	{
		return redirect()->back()->withInput() ;
	}
}
