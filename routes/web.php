<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('product-list', 'ProductController@index');
Route::get('product-list/{id}/edit', 'ProductController@edit');
Route::get('product-list/{id}/changestatus', 'ProductController@changestatus');
Route::post('product-list/store', 'ProductController@store');
Route::get('product-list/delete/{id}', 'ProductController@destroy');
Route::get('product-list/sendinvoice/{id}', 'ProductController@sendInvoice');


Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('angrytom97@yahoo.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});



Route::get('/', 'HomeController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/logIn', 'AdminController@logIn');
Route::post('/admin/logIn','AdminController@postLogIn') ;

Route::get('/admin/logout', 'AdminController@logOut');

Route::get('/admin/orderlist', 'AdminController@orderlist');

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@postSendMessage');

Route::get('/service', 'ServiceController@index');
Route::get('/service/{id}','ServiceController@detail');

Route::get('/order','OrderController@index');
Route::get('/order/{id}','OrderController@detail');
Route::post('/order','OrderController@postOrder');

Route::get('/order/delete/{id}','OrderController@delete');

//Route::post('order/delete', function() {    return 'ok';});
// {   	return view('order', ['bgImg' => array("order_1"),'service_id'=>$id]);});
