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
use App\Service ;
use Hash ;
use Auth ;
class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function index()
	{
		if( Auth::check() ) return redirect("/admin/orderlist");
		return redirect("/admin/logIn") ;
//		return view('admin') ;
	} 
	public function logIn()
	{
		return view('admin_login') ;
	}

	public function logOut()
	{
		Auth::logOut() ;
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
	public function postEditService(Request $req)
	{
		$validatedData = ([
            'name' => $req->name,
            'summary' => $req->summary,
            'detail' => $req->detail,
            'image_path' => $req->image_path,
            'price' => $req->price,
        ]);
        Service::whereId($req->id)->update($validatedData);
        return redirect()->back() ;
	}

	public function postAddService(Request $req)
	{
		Service::create(
			[
	  	        'name' => $req->name,
	            'summary' => $req->summary,
	            'detail' => $req->detail,
	            'image_path' => $req->image_path,
	            'price' => $req->price
  	      	]
	      );		
        return redirect()->back() ;
	}

	public function postUpdateAdmin( Request $req ) 
	{
		$validatedData = ([
            'name' => $req->username,
            'email' => $req->username,
            'password' => Hash::make($req->password),
        ]);
        User::whereId(Auth::id())->update($validatedData);
        return redirect()->back()->with('success',1) ;
	}

	public function postLogIn(Request $req)
	{
		$credentials = $req->only('name', 'password');
        if (Auth::attempt($credentials)) {
			return redirect("/admin/orderlist") ;
        }
		else return redirect()->back()->with('error', 1 );
	}
	public function servicelist()
	{
		$services = DB::select('select * from service' );
	 	return view('admin_servicelist', [
	 		'services' => $services
	 	]);
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
