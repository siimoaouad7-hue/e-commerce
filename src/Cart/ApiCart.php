<?php

namespace App\Cart;

class ApiCart implements CartInterface
{
    public function add(int $productId, int $quantity): void
    {
        dd('ApiCart: add product ' . $productId . ' with quantity ' . $quantity);
    }

    public function remove(int $productId): void
    {
        dd('ApiCart: remove product ' . $productId);
    }

    public function getItems(): array
    {
        dd('ApiCart: get items');
    }

    public function getTotal(): float
    {
        dd('ApiCart: get total');
    }

    public function clear(): void
    {
        dd('ApiCart: clear cart');
    }
}
