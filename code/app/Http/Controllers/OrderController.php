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
		$address = $req->input('address') ;

		$data=array('email'=>$mail,'address'=>$address);
		DB::table('orders')->insert($data);
		echo var_dump($mail);
//		return redirect('/order') ;
	}
}
