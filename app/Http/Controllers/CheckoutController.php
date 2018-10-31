<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function store(CheckoutRequest $request){
        try{
            $contents = Cart::instance('default')->content()->map(function ($item){ // собираем json с данными про товары в корзине что бы передать его в stripe
                    return $item->model->slug.', '.$item->qty;
                })->values()->toJson();

            $charge = Stripe::charges()->create([ // создаём и передаём в stripe данные про заказ
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

            Cart::instance('default')->destroy(); // удаляем содержимое корзины
            return redirect()->route('confirmation.index')->with('success_message','Thank you! Your payment was successfully accepted!'); // обязательно передаём success_message
        } catch (CardErrorException $e){
            return back()->withErrors('Error! '. $e->getMessage());
        }
    }
}
