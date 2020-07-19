<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Order;
use DB;
use Illuminate\Http\Request;
use App\User ;
use Hash ;
use Auth ;
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

	public function postRegister( Request $req )
	{
		User::create(
			[
		        'name' => $req->input('name'),
		        'email' => $req->input('name'),
		        'password' => Hash::make($req->input('password'))
	      	]
	      );
	}

	public function postLogIn(Request $req)
	{
		$credentials = $req->only('name', 'password');
        if (Auth::attempt($credentials)) {
			return redirect("/admin/orderlist") ;
        }
		else return redirect()->back()->with('error', 1 );
	}
	public function orderlist()
	{
	 	return view('admin_orderlist');
    /*
    		$orders = DB::select('select * from orders');

		return view('admin_orderlist', [
			'orders' => $orders
		]);*/
	}
}
