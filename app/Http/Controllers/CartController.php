<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(),[
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()){
            session()->flash('errors', collect(['quantity must be between 1 and 5']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id,$request->quantity);
        session()->flash('success_message', 'Quantity was updated successfuly!');
        return response()->json(['success' => true]);

    }

    public function destroy($id)
    {
        Cart::remove($id); // удаляем товар по rowId
        return back()->with('success_message','item has been removed!');
    }

    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id); // сохраняем коллекцию товара из корзины по rowId
        Cart::remove($id); // удаляем товар из корзины по rowId

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) { // проверяем, не находится ли этот товар уже в вишлисте
            return $rowId == $id;
        });
        if ($duplicates->isNotEmpty()) { // если этот товар уже находится в вишлисте, то перенаправляем обратно с сообщением что он уже в вишлисте
            return redirect()->route('cart.index')->with('success_message', 'Item is already Saved For Later!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate(Product::class); // добавляем его в вишлист и ассоциируем с моделью
        return redirect()->route('cart.index')->with('success_message','Item has been saved for later');
    }
}
