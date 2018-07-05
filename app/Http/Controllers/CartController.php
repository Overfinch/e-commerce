<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{

    public function index()
    {
        $mightAlsoLike = Product::mightAlsoLike()->get();
        return view('cart')->with([
            'mightAlsoLike' => $mightAlsoLike
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) { // проверяем, не находится ли этот товар уже в крозине
            return $cartItem->id == $request->id;
        });
        if ($duplicates->isNotEmpty()) { // если этот товар уже находится в корзине, то перенаправляем обратно с сообщением что он уже в корзине
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        }

        $product = Product::findOrFail($request->id); // находим продукт по id
        Cart::add($product->id, $product->name, 1, $product->price)->associate(Product::class); // добавляем его в корзину и ассоциируем с моделью
        return redirect()->route('cart.index')->with('success_message','Item was added to your cart');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Cart::remove($id); // удаляем товар по rowId
        return back()->with('success_message','item has been removed!');
    }
}
