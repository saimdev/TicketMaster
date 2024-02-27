<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class Accounts extends Controller
{
    public function showAccount(){
        return view('stripe');
    }

    public function addAccount(Request $request){
        $validatedData = $request;

        $account = new Account();
        $account->name = $validatedData['cardName'];
        $account->cardnumber = $validatedData['cardNum'];
        $account->cvc = $validatedData['cvc'];
        $account->exp_month = $validatedData['expMonth'];
        $account->exp_year = $validatedData['expYear'];
        $account->save();

        return redirect()->back()->with('success', 'Account added successfully');
    }

    public function showAllAccount()
    {
        $accounts = Account::all();
        return view('accounts', compact('accounts'));
    }

}
