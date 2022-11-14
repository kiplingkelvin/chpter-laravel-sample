<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/********    Chpter Payments *********/
Route::get('chpter_mpesa_payment', 'App\Http\Controllers\PaymentsController@mpesaPayment');
Route::post('mpesa_payment_callback_url', 'App\Http\Controllers\PaymentsController@mpesaPaymentCallback');

Route::get('chpter_card_payment', 'App\Http\Controllers\PaymentsController@cardPayment');
Route::post('card_payment_callback_url', 'App\Http\Controllers\PaymentsController@cardPaymentCallback');