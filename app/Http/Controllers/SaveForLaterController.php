<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SaveForLaterController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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


    public function switchToCart($id)
    {

        $item = Cart::instance('saveForLater')->get($id); // сохраняем коллекцию товара из вишлиста по rowId
        Cart::instance('saveForLater')->remove($id); // удаляем товар из вишлиста по rowId

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) { // проверяем, не находится ли этот товар уже в корзине
            return $rowId == $id;
        });
        if ($duplicates->isNotEmpty()) { // если этот товар уже находится в вишлисте, то перенаправляем обратно с сообщением что он уже в вишлисте
            return redirect()->route('cart.index')->with('success_message', 'Item is already in Cart!');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate(Product::class); // добавляем его в вишлист и ассоциируем с моделью
        return redirect()->route('cart.index')->with('success_message','Item has been added to Cart!');
    }

    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id); // удаляем товар по rowId
        return back()->with('success_message','item has been removed!');
    }
}
