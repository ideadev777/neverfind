<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use DB;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function index()
	{
		$services = DB::select("select * from service where ishome = 1 " );
	 	return view('welcome', 
	 		[
	 			'bgImg' => [ ["home_1","YOUR PERSONALISED HOME CONCIERGE"], ["home_2","EXPERIENCE AN UNRIVALLED HOSPITALITY SERVICE"], ["home_3","HAPPINESS IS HOME-MADE"]] ,
	 			'services' => $services
		 	]
		 );
	} 
}
