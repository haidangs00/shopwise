<?php

namespace App\Helper;

use Session;

class CompareHelper
{
    public $items = [];
    public $count = 0;
    public $limited = 3;

    public function __construct()
    {
        $this->items = session('compare') ? session('compare') : [];
        $this->count = $this->countItem();
    }

    public function add($product)
    {
        if (isset($this->items[$product->id]) || $this->count < $this->limited) {
            $item = [
                'id' => $product->id,
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->promotional_price > 0 ? $product->promotional_price : $product->regular_price,
                'description' => $product->description,
                'colors' => $product->productColors,
                'sizes' => $product->productSizes
            ];
            $this->items[$product->id] = $item;
            session(['compare' => $this->items]);

            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $item = $this->items[$id];

        if (isset($item)) {
            unset($this->items[$id]);
        }
        session(['compare' => $this->items]);

        return true;
    }

    public function countItem()
    {
        return count($this->items);
    }

    public function clear()
    {
        session(['compare' => '']);
    }
}
