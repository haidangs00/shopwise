<?php

namespace App\Helper;

use Session;

class CartHelper
{
    public $items = [];
    public $total_quantity = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_quantity = $this->totalQuantity();
    }

    public function add($product, $quantity = 1)
    {
        $item = [
            'id' => $product->id,
            'image' => $product->image,
            'name' => $product->name,
            'price' => $product->promotional_price > 0 ? $product->promotional_price : $product->regular_price,
            'quantity' => $quantity,
        ];
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += $quantity;
        } else {
            $this->items[$product->id] = $item;
        }
        session(['cart' => $this->items]);
    }

    public function update($data, $cart)
    {
        $cart = $cart->items;
        $data = $data['quantity'];
        foreach ($data as $key => $value) {
            foreach ($cart as $keyCart => $valueCart) {
                if ($valueCart['id'] == $key) {
                    if ($cart[$keyCart]['quantity'] <= 0) {
                        $cart[$keyCart]['quantity'] = 1;
                    } else {
                        $cart[$keyCart]['quantity'] = $value;
                    }
                }
            }
        }
        session(['cart' => $cart]);
    }

    public function delete($id)
    {
        $item = $this->items[$id];

        if (isset($item)) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }

    public function totalQuantity()
    {
        foreach ($this->items as $item) {
            $this->total_quantity += $item['quantity'];
        }
        return $this->total_quantity;
    }

}
