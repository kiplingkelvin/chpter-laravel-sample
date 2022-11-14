<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class PaymentsController extends Controller{


   /******* Mpesa Payment API **********/
    public function mpesaPayment(Request $request){

        $chpter= new \KiplingKelvin\ChpterLaravelSdk\Chpter();

        $customer = array( 
            "payment_method"=> "MPesa",
            "full_name"=> "John Doe",
            "location"=> "Nairobi",
            "phone_number"=> "254706347307",
            "email"=> "johndoe@mail.com"  );

        $products = array(  array( 
                "product_id"=> "08",
                "product_name"=> "HoodEez",
                "quantity"=> "1",
                "unit_price"=> "1" ));

        $amount = array( 
                "delivery_fee"=> "0",
                "discount_fee"=> "0",
                "total"=> "1",
                "currency"=> "kes");

        $callback_details = array( 
                "transaction_reference"=>  "123456789123",
                "callback_url"=>  "https://b54c-197-232-140-206.in.ngrok.io/api/mpesa_payment_callback_url" );

        
        Log::info('********Starting Mpesa Api Request**********');
        $response = $chpter->mpesaPayment($customer, $products, $amount, $callback_details);

        Log::alert('Chpter Mpesa API Response');
        //The response is in json
        return $response;

    }



    /******* Mpesa Payment CallBack **********/
    public function mpesaPaymentCallback(Request $request){

        Log::info('******** Mpesa Payment CallBack Hit **********');
        
        $data = $request->getContent();
        
        $response = json_decode($data, true);

        Log::alert($response);
        //Response Sample
        // 'id' => '109128-79438818-1',
        // 'transaction_reference' => '123456789123',
        // 'response status' => 406,
        // 'amount' => 1,
        // 'paid' => 'False',
        // 'payment status' => 'Payment Incomplete.',
        // 'message' => 'Request cancelled by user',

        Log::alert($response['id']);
        Log::alert($response['transaction_reference']);
        Log::alert($response['response status']);
        Log::alert($response['amount']);
        Log::alert($response['paid']);
        Log::alert($response['payment status']);
        Log::alert($response['message']);

        Log::info('******** Mpesa Payment CallBack End **********');


    }


       /******* Card Payment API **********/
       public function cardPayment(Request $request){

        $chpter= new \KiplingKelvin\ChpterLaravelSdk\Chpter();

        $customer = array( 
            "payment_method"=> "Card",
            "full_name"=> "John Doe",
            "location"=> "Nairobi",
            "phone_number"=> "254706347307",
            "email"=> "johndoe@mail.com"  );

        $products = array(  array( 
                "product_id"=> "08",
                "product_name"=> "HoodEez",
                "quantity"=> "1",
                "unit_price"=> "1" ));

        $amount = array( 
                "delivery_fee"=> "0",
                "discount_fee"=> "0",
                "total"=> "1",
                "currency"=> "kes");

        $card_details = array( 
            "card_number"=> "4545454545454545",
            "expiry_month"=> "08",
            "expiry_year"=> "2024",
            "cvc"=> "123");

        $callback_details = array( 
                "transaction_reference"=>  "123456789123",
                "callback_url"=>  "https://df02-197-232-140-206.in.ngrok.io/api/card_payment_callback_url" );

        
        Log::info('********Starting Card Api Request**********');
        $response = $chpter->cardPayment($customer, $products, $amount, $card_details, $callback_details);

        //The response is in json
        Log::alert('Chpter Card API Response');
        return $response;

    }



    /******* Card Payment CallBack **********/
    public function cardPaymentCallback(Request $request){

        Log::info('******** Card Payment CallBack Hit **********');

        $data = $request->getContent();
    
        
        $response = json_decode($data, true);

        Log::alert($response['amount']);
        Log::alert($response['message']);

        Log::info('******** Card Payment CallBack End **********');


    }




}