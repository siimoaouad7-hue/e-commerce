<?php

namespace App\Controller;

use App\Cart\CartHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(CartHandler $cartHandler): Response
    {
        return $this->render('main/cart.html.twig', [
            'items' => $cartHandler->getItems(),
            'total' => $cartHandler->getTotal(),
        ]);
    }

    #[Route('/cart/add/{id}', name: 'app_cart_add', methods: ['POST'])]
    public function add(int $id, Request $request, CartHandler $cartHandler): Response
    {
        $quantity = (int) $request->request->get('quantity', 1);
        $cartHandler->add($id, $quantity);

        return $this->redirectToRoute('app_cart');
    }

    #[Route('/cart/remove/{id}', name: 'app_cart_remove')]
    public function remove(int $id, CartHandler $cartHandler): Response
    {
        $cartHandler->remove($id);

        return $this->redirectToRoute('app_cart');
    }

    #[Route('/cart/clear', name: 'app_cart_clear')]
    public function clear(CartHandler $cartHandler): Response
    {
        $cartHandler->clear();

        return $this->redirectToRoute('app_cart');
    }
}
