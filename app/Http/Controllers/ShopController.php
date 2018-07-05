<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        $products = Product::inRandomOrder()->take(12)->get();

        return view('shop')->with('products', $products);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

        $isInCart = $this->isInCart($product);

        return view('product')->with([
            'product' => $product,
            'isInCart' => $isInCart,
            'mightAlsoLike' => $mightAlsoLike
        ]);
    }

    private function isInCart(Product $product){
        $isInCart = Cart::search(function ($cartItem) use ($product){ // проверяем есть ли этот товар уже в корзине
            return $cartItem->id === $product->id;
        });

        return $isInCart->isNotEmpty(); // true если товар уже в корзине, и false если нет
    }
}
