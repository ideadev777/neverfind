<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use DB;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function index()
	{
	 	return view('contact', [
			'bgImg' => [ ["slider-03","Picture_1"]],
	 	]);
	} 
	public function postSendMessage(Request $req)
	{
		$mail = $req->input('email') ;
		$name = $req->input('name') ;
		$mobile = $req->input('phone_number') ;
		$subject = $req->input('subject') ;
		$content = $req->input('message') ;
		$current_time = date('Y-m-d H:i:s');
		$data=array('email_address'=>$mail, 'name'=>$name, 'phone_number'=>$mobile,'subject'=>$subject,'content'=>$content,'post_date'=>$current_time);
		DB::table('contact_message')->insert($data);
		return true;
	}
}
