<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        $totalPayment = $request->totalMinPrice;
        Stripe\Stripe::setApiKey('sk_test_51Oad4rK9FJ9sxaqhsEvY59vJpSptxiw5BxSuYOzF608SkhQABn5lO90C8wnbxFvRETDC4l2n8f693ZKuJg9rCpiK00O6rFN1pU');
        $session = Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd', 
                    'unit_amount' => $totalPayment * 100, 
                    'product_data' => [
                        'name' => 'Ticket Master Tickets', 
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://127.0.0.1:8000/newEvents', 
            'cancel_url' => 'https://example.com/cancel', 
        ]);

        return redirect()->away($session->url);
    }

    // public function stripePost(Request $request)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     Stripe\Charge::create([
    //         'amount' => 500,
    //         'currency' => 'gbp',
    //         'payment_method' => 'pm_card_visa',
    //         'source' => $request->stripe->token,
    //         'description' => 'Test Payment by Saim'
    //     ]);

    //     Session::flash('success', "Payment Successful");
    //     return redirect('https://buy.stripe.com/test_dR6dSjeNw6d96zK7su');
    // }
}

