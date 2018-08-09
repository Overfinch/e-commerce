<?php

namespace App\Http\Controllers;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function store(Request $request){
        try{
            $charge = Stripe::charges()->create([
                'amount' => Cart::total() / 100,
                'currency' => 'UAH',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    //'contents' => $contents,
                    //'quatity' => Cart::istance('default')->count(),
                ],
            ]);

            return back()->with('success_message','Thank yoy for payment!');
        } catch (\Exception $e){

        }
    }
}
