<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class PayoutController extends Controller{

    /******* Mobile Payout Destination API **********/
    public function creatingMobilePayoutDestination(Request $request){

        $chpter= new \KiplingKelvin\ChpterLaravelSdk\ChpterPayouts();

        $type = "Mpesa";
        $phoneNumber = "254700000000";
        
        Log::info('********Starting Api Request**********');
        $response = $chpter->createMobilePayoutDestination($type, $phoneNumber);
        //The response is in json
        Log::alert('Chpter API Response');
        return $response;

    }

      /******* Mobile Payout Destination API **********/
      public function creatingBankPayoutDestination(Request $request){

        $chpter= new \KiplingKelvin\ChpterLaravelSdk\ChpterPayouts();

        $bankName = "KCB";
        $bankAccountName = "ALBERT CHELA";
        $bankAccountNumber = "123451267";
        
        Log::info('********Starting Api Request**********');
        $response = $chpter->createBankPayoutDestination($bankName, $bankAccountName, $bankAccountNumber);
        //The response is in json
        Log::alert('Chpter API Response');
        return $response;

    }
}