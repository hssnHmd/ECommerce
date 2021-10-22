<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        $paniers=$request->user()->paniers()->get();
        $tot_price=0;

      foreach($paniers as $panier){
           $temp=$panier->items()->get();
           $tot_price=$tot_price + $temp[0]->price;
           
      }
        return view('stripe',["price"=>$tot_price]);
    }
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request,float $price)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
                "amount" => $price * 100,
                "currency" => "mad",
                "source" => $request->stripeToken,
                "description" => "This payment is tested purpose phpcodingstuff.com"
        ]);
   
        Session::flash('success', 'Payment successful!');
           
        return back();
    }
}