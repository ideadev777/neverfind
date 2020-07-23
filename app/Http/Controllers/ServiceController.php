<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use DB;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function index()
	{
//		$services = DB::select('select * from service order by rank ' );
		$services = DB::select('select * from service' );
	 	return view('service', [
			'bgImg' => [ ["service_1","Picture_1"], ["service_2","Picture_2"]],
	 		'services' => $services
	 	]);
	} 
	public function detail($id)
	{
		$detail = DB::select('select * from service where id='.$id);
		return view('servicedetail', [
				'detail' => $detail[0]
		]);
	}   
}
