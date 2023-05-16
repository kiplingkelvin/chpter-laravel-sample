<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class AccountsController extends Controller{

    public function __construct()
    {
  
    }

    /******* Account sToken Renewal API **********/
    public function accountsTokenRenewal(Request $request){

        $chpter= new \KiplingKelvin\ChpterLaravelSdk\Chpter();

        $response = $chpter->accountsTokenRenewal();

        //The response is in json
        Log::alert('Chpter Card API Response');
        return $response;

    }






}