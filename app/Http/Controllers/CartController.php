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
        $product = Product::findOrFail($request->id);
        Cart::add($product->id, $product->name, 1, $product->price)->associate(Product::class);
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
        //
    }
}
