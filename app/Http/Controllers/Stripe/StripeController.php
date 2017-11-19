<?php

namespace App\Http\Controllers\Stripe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StripeController extends Controller
{
    //

    public function config() {
      $stripe = array(
        "secret_key"      => "sk_test_BQokikJOvBiI2HlWgH4olfQ2",
        "publishable_key" => "pk_test_6pRNASCoBOKtIshFeQd4XMUh"
      );

      \Stripe\Stripe::setApiKey($stripe['secret_key']);

      return view('donate', ['stripe_key' =>  $stripe['publishable_key'], 'result' => 0] );
    }

    public function charge(Request $request) {
      $token  = $request->get('stripeToken');
      $amount = $request->get('amount-us')*100;
      $email = $request->get('stripeEmail');

      $stripe = array(
        "secret_key"      => "sk_test_BQokikJOvBiI2HlWgH4olfQ2",
        "publishable_key" => "pk_test_6pRNASCoBOKtIshFeQd4XMUh"
      );

      \Stripe\Stripe::setApiKey($stripe['secret_key']);

      $customer = \Stripe\Customer::create(array(
          'email' => $email,
          'source'  => $token
      ));

      $charge = \Stripe\Charge::create(array(
          'customer' => $customer->id,
          'amount'   => $amount,
          'currency' => 'usd'
      ));

      //return view('donate', ['result' =>  'Successfully charged $50.00!'] );
      return view('confirm');
    }

}
