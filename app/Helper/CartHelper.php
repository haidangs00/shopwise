<?php

namespace App\Helper;

use App\Models\Color;
use App\Models\Size;
use Session;

class CartHelper
{
    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;
    public $item_number = 0;


    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_quantity = $this->totalQuantity();
        $this->total_price = $this->totalPrice();
        $this->item_number = $this->getItemNumber();
    }

    public function add($product, $data)
    {
        //dd($this->items);
        $item_add = [
            'item_id' => $this->item_number + 1,
            'id' => $product->id,
            'image' => $product->image,
            'name' => $product->name,
            'price' => $product->promotional_price > 0 ? $product->promotional_price : $product->regular_price,
            'quantity' => $data['quantity'],
            'color' => $data['color_id'],
            'color_name' => Color::findOrFail($data['color_id'])->name,
            'size' => $data['size_id'],
            'size_name' => Size::findOrFail($data['size_id'])->name
        ];

        if ($this->items !== []) {
            $check = false;
            foreach ($this->items as $item) {
                if ($item['id'] == $product->id && $item['color'] == $data['color_id'] && $item['size'] == $data['size_id']) {
                    $this->items[$item['item_id']]['quantity'] += $data['quantity'];
                    $check = true;
                    break;
                }
            }
            if (!$check) {
                $this->items[$this->item_number + 1] = $item_add;
            }
        } else {
            $this->items[$this->item_number + 1] = $item_add;
        }


        session(['cart' => $this->items]);
        return true;
    }

    public function update($data, $cart)
    {
//      session(['cart' => '']);
        $cart = $cart->items;
        $data = $data['quantity'];
        foreach ($data as $key => $value) {
            foreach ($cart as $keyCart => $valueCart) {
                if ($valueCart['item_id'] == $key) {
                    if ($value <= 0) {
                        $cart[$keyCart]['quantity'] = 1;
                    } else {
                        $cart[$keyCart]['quantity'] = $value;
                    }
                }
            }
        }
        session(['cart' => $cart]);

        return true;
    }

    public function delete($id)
    {
        $item = $this->items[$id];

        if (isset($item)) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);

        return true;
    }

    public function getItemNumber()
    {
        return count($this->items);
    }

    public function totalQuantity()
    {
        foreach ($this->items as $item) {
            $this->total_quantity += $item['quantity'];
        }
        return $this->total_quantity;
    }

    public function totalPrice()
    {
        foreach ($this->items as $item) {
            $this->total_price += $item['price'] * $item['quantity'];
        }
        return $this->total_price;
    }

    public function clear()
    {
        session(['cart' => '']);
    }
}
