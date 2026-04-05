<?php

namespace App\Cart;

class CartHandler
{
    public function __construct(
        private CartInterface $cartStrategy,
    ) {}

    public function add(int $productId, int $quantity): void
    {
        $this->cartStrategy->add($productId, $quantity);
    }

    public function remove(int $productId): void
    {
        $this->cartStrategy->remove($productId);
    }

    public function getItems(): array
    {
        return $this->cartStrategy->getItems();
    }

    public function getTotal(): float
    {
        return $this->cartStrategy->getTotal();
    }

    public function clear(): void
    {
        $this->cartStrategy->clear();
    }
}
