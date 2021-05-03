<?php

namespace App\Http\Controllers\ClientControllers;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(CartHelper $cart, $id)
    {
        $product = Product::find($id);
        $cart->add($product);

        return redirect()->route('clients.show_cart');
    }

    public function showCart()
    {
//        $request->session()->forget('cart');

        return view('client.pages.show-cart');
    }

    public function updateCart(Request $request, CartHelper $cart)
    {
        $cart->update($request->all(), $cart);

        return redirect()->back();
    }

    public function deleteCart(CartHelper $cart, $id)
    {
        $cart->delete($id);

        return redirect()->back();
    }
}
