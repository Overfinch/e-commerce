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
            $contents = Cart::instance('default')->content()->map(function ($item){
                    return $item->model->slug.', '.$item->qty;
                })->values()->toJson();

            $charge = Stripe::charges()->create([
                'amount' => Cart::instance('default')->total() / 100,
                'currency' => 'UAH',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quatity' => Cart::instance('default')->count(),
                ],
            ]);
            Cart::instance('default')->destroy();
            return redirect()->route('confirmation.index')->with('success_message','Thank you! Your payment was successfully accepted!');
        } catch (\Exception $e){

        }
    }
}
