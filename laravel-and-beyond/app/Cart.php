<?php

namespace App;

class Cart
{
    protected $items = [];

    public function add(Product $product, $quantity)
    {
        $this->items[$product->id] = [
            'product' => $product,
            'quantity' => $quantity,
        ];
    }

    public function updateQuantity($productId, $quantity)
    {
        if (array_key_exists($productId, $this->items)) {
            $this->items[$productId]['quantity'] = $quantity;
        }
    }

    public function remove($productId)
    {
        unset($this->items[$productId]);
    }

    public function clear()
    {
        $this->items = [];
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item['product']->price * $item['quantity'];
        }

        return $total;
    }
}
