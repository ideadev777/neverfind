<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use DB;
use Illuminate\Http\Request;
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
		$name = $req->input('name') ;
		$address = $req->input('address') ;
		$mobile = $req->input('mobile-number') ;
		$pay = $req->input('pay-email') ;
		$service_id = $req->input('service-type') ;

		$data=array(
			'email'=>$mail,
			'address'=>$address,
			'mobile-number' => $mobile,
			'name' => $name, 
			'pay-email' => $pay,
			'service_id' => $service_id
		);
		DB::table('orders')->insert($data);
		return redirect()->back()->with('success', 1 );
 	//	return redirect('/order') ;
	}
	public function delete($id)
	{
		return redirect()->back()->withInput() ;
	}
}
