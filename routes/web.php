<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BankController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/bank', function () {
    return view('/bank/bank');
});

Route::get('/bank1', function () {
    return view('/bank/bank1');
});

Route::get('/bank2', function () {
    return view('/bank/bank2');
});

Route::get('/bank3', function () {
    return view('/bank/bank3');
});

Route::get('/kg', function () {
    return view('/pay/kginicis');
});

Route::get('/user', function () {
    return view('/bank/bank_user');
});

// Route::get('/token', function(Request $request){
//     if($request->has('error')){
//         //에러 처리
//     }

//     $http = new GuzzleHttp\Client;

//     $response = $http->post('https://testapi.openbanking.or.kr/oauth/2.0/token',[
//         'form_params' => [
//             'code' => '',
//             'client_id' => 'cf0c9afa-18f4-4f87-a024-3171ad75907f',
//             'client_secret' => 'a58e954c-8eb3-4eef-9e66-2f9f3242aaae',
//             'redirect_uri' => 'http://127.0.0.1:8000/bank/request',
//             'grant_type' => 'authorization_code',
            
//         ],
//     ]);

    
// });


// Route::get('/bank/request/{code?}', function($code = null) {
//     return $code;
    
//     return view('bank.bank_request', compact('code'));
// });
Route::get('/bank/request/{code?}', 'BankController@result');
//Route::post('https://testapi.openbanking.or.kr/oauth/2.0/token', 'BankController@token_result');
//Route::get('/bank/request', 'BankController@bank_request');

Route::get('/boards', 'BoardController@index');
Route::get('/boards/create', 'BoardController@create');
Route::post('/boards','BoardController@store');
Route::get('/boards/{board}', 'BoardController@show');
Route::get('/boards/{board}/edit', 'BoardController@edit');
Route::put('/boards/{board}', 'BoardController@update');
Route::delete('/boards/{board}', 'BoardController@destroy');

//Route::post('/bank/request','BoardController@bank_request');

//Route::get('/',[TaskController::class,'index']);
Route::get('/list','LoginController@list');

Route::get('/login','LoginController@loginpage');
Route::post('/index','LoginController@login');
Route::get('/create','LoginController@createpage');
Route::post('/create','LoginController@store');
Route::post('/logout','LoginController@logout');

//학생<->수업
Route::get('/join_test', 'LoginController@join_test');
Route::get('/class/{user}', 'LoginController@class_test');

Route::get('/user_class_join', 'LoginController@user_class_join');
Route::get('/get_class/{user}', 'LoginController@get_class');

Route::get('/get_user/{class}', 'LoginController@get_user');

//학생->수업등록, 수업->수업삭제
Route::get('/insert_class_view/{user}', 'LoginController@insert_class_view');
Route::post('/insert_class', 'LoginController@insert_class');
Route::get('/delete_class/{class}/{user}', 'LoginController@delete_class');

Route::get('/pay_return', function () {
    return view('/pay/pay_return');
});
Route::get('/pay', function () {
    return view('pay');
});
Route::get('/pay_result', 'LoginController@pay_result');
Route::get('/pay_token', 'LoginController@pay_token');
Route::get('/pay_tokens', 'LoginController@pay_token');
?>