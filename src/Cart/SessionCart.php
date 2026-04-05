<?php

namespace App\Cart;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class SessionCart implements CartInterface
{
    private const CART_KEY = 'cart';

    public function __construct(
        private RequestStack $requestStack,
        private ProductRepository $productRepository,
    ) {}

    private function getSession(): \Symfony\Component\HttpFoundation\Session\SessionInterface
    {
        return $this->requestStack->getSession();
    }

    public function add(int $productId, int $quantity): void
    {
        $cart = $this->getSession()->get(self::CART_KEY, []);

        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }

        $this->getSession()->set(self::CART_KEY, $cart);
    }

    public function remove(int $productId): void
    {
        $cart = $this->getSession()->get(self::CART_KEY, []);
        unset($cart[$productId]);
        $this->getSession()->set(self::CART_KEY, $cart);
    }

    public function getItems(): array
    {
        $cart = $this->getSession()->get(self::CART_KEY, []);
        $items = [];

        foreach ($cart as $productId => $quantity) {
            $product = $this->productRepository->find($productId);
            if ($product) {
                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'total' => $product->getPrice() * $quantity,
                ];
            }
        }

        return $items;
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->getItems() as $item) {
            $total += $item['total'];
        }
        return $total;
    }

    public function clear(): void
    {
        $this->getSession()->remove(self::CART_KEY);
    }
}
