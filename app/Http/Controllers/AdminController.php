<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use DB;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function index()
	{
		return redirect("/admin/logIn") ;
//		return view('admin') ;
	} 
	public function logIn()
	{
		return view('admin_login') ;
	}

	public function logOut()
	{
		return redirect("/admin/logIn") ;
	}

	public function postLogIn(Request $req)
	{
		return redirect("/admin/orderlist") ;
	}
	public function orderlist()
	{
		$orders = DB::select('select * from orders');

		return view('admin_orderlist', [
			'orders' => $orders
		]);
	}
}
