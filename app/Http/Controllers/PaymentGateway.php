<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentGateway extends Controller
{
    public function payment(Request $request){
        $accountId = $request->input('accountId');
        echo $accountId;
    }
}
