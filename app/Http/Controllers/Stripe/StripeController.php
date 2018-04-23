<?php

namespace App\Http\Controllers\Stripe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StripeController extends Controller
{
    //

    public function config() {
      $stripe = array(
        "secret_key"      => "sk_live_dogNErtw5jFqusLVoceIt6Pe",
        "publishable_key" => "pk_live_dwVbjMBEoByGdfMGR8SZrW1d"
      );

      \Stripe\Stripe::setApiKey($stripe['secret_key']);

      return view('donate', ['stripe_key' =>  $stripe['publishable_key'], 'result' => 0] );
    }

    public function charge(Request $request) {
      $token  = $request->get('stripeToken');
      $amount = $request->get('amount-us')*100;
      $email = $request->get('stripeEmail');

      $stripe = array(
        "secret_key"      => "sk_live_dogNErtw5jFqusLVoceIt6Pe",
        "publishable_key" => "pk_live_dwVbjMBEoByGdfMGR8SZrW1d"
      );

      \Stripe\Stripe::setApiKey($stripe['secret_key']);

      $customer = \Stripe\Customer::create(array(
          'email' => $email,
          'source'  => $token
      ));



      try {
        // Use Stripe's library to make requests...
        $charge = \Stripe\Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $amount,
            'currency' => 'usd'
        ));
        $success = 1;
      } catch(\Stripe\Error\Card $e) {
        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $e->getJsonBody();
        $err  = $body['error'];

      /*  print('Status is:' . $e->getHttpStatus() . "\n");
        print('Type is:' . $err['type'] . "\n");
        print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        print('Param is:' . $err['param'] . "\n");
        print('Message is:' . $err['message'] . "\n"); */
      } catch (\Stripe\Error\RateLimit $e) {
        // Too many requests made to the API too quickly
        $body = $e->getJsonBody();
        $err  = $body['error'];
      } catch (\Stripe\Error\InvalidRequest $e) {
        // Invalid parameters were supplied to Stripe's API
        $body = $e->getJsonBody();
        $err  = $body['error'];
      } catch (\Stripe\Error\Authentication $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
        $body = $e->getJsonBody();
        $err  = $body['error'];
      } catch (\Stripe\Error\ApiConnection $e) {
        // Network communication with Stripe failed
        $body = $e->getJsonBody();
        $err  = $body['error'];
      } catch (\Stripe\Error\Base $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
        $body = $e->getJsonBody();
        $err  = $body['error'];
      } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
        $body = $e->getJsonBody();
        $err  = $body['error'];
      }

      //return view('donate', ['result' =>  'Successfully charged $50.00!'] );
      if ($success == 1) {
        return view('confirm');
      } else {
        return session()->flash('status','Error: ' . $err['message']);
      }
    }

}
