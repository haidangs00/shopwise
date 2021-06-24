<?php

namespace App\Http\Controllers\ClientControllers;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(CartHelper $cart, $id, Request $request)
    {
        if ($request->all() !== null) {
            $product = Product::find($id);
            $created = $cart->add($product, $request->only('color_id', 'size_id', 'quantity'));
        }

        if ($created) {
            return response()->json(['message' => 'Đã thêm sản phẩm vào giỏ hàng!', 'status' => true, 'redirect' => route('clients.show_cart')]);
        }
        return response()->json(['message' => 'Đã xảy ra lỗi, vui lòng thử lại sau!', 'status' => false]);

    }

    public function showCart()
    {
        return view('client.pages.show-cart');
    }

    public function updateCart(Request $request, CartHelper $cart)
    {
        $updated = $cart->update($request->all(), $cart);
        if ($updated) {
            return response()->json(['message' => 'Cập nhập thành công!', 'status' => true]);
        }
    }

    public function deleteCart(CartHelper $cart, $id)
    {
        $deleted = $cart->delete($id);
        if ($deleted) {
            return response()->json(['message' => 'Đã xóa sản phẩm khỏi giỏ hàng!']);
        }
        return response()->json(['message' => 'Xóa sản phẩm thất bại!']);
    }

}
