<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categoriesData = [
            ['name' => 'Electronics', 'description' => 'Headphones, speakers, gadgets and more'],
            ['name' => 'Fashion', 'description' => 'Clothing, accessories and footwear'],
            ['name' => 'Home and Garden', 'description' => 'Furniture, decor and gardening tools'],
            ['name' => 'Sports and Fitness', 'description' => 'Workout gear, yoga mats and equipment'],
            ['name' => 'Books', 'description' => 'Fiction, non-fiction and educational'],
            ['name' => 'Beauty and Health', 'description' => 'Skincare, cosmetics and wellness'],
        ];

        $categories = [];
        foreach ($categoriesData as $catData) {
            $category = new Category();
            $category->setName($catData['name']);
            $category->setDesciption($catData['description']);
            $manager->persist($category);
            $categories[$catData['name']] = $category;
        }

        $productsData = [
            ['name' => 'Wireless Headphones', 'price' => 79.99, 'description' => 'Premium sound quality with noise cancellation.', 'category' => 'Electronics'],
            ['name' => 'Bluetooth Speaker', 'price' => 59.99, 'description' => 'Portable speaker with deep bass.', 'category' => 'Electronics'],
            ['name' => 'Smartphone Stand', 'price' => 19.99, 'description' => 'Adjustable aluminum stand.', 'category' => 'Electronics'],
            ['name' => 'Wireless Mouse', 'price' => 29.99, 'description' => 'Ergonomic wireless mouse.', 'category' => 'Electronics'],
            ['name' => 'Mechanical Keyboard', 'price' => 89.99, 'description' => 'RGB mechanical keyboard.', 'category' => 'Electronics'],
            ['name' => 'Power Bank 20000mAh', 'price' => 39.99, 'description' => 'High capacity portable charger.', 'category' => 'Electronics'],
            ['name' => 'Classic Leather Jacket', 'price' => 149.99, 'description' => 'Genuine leather jacket.', 'category' => 'Fashion'],
            ['name' => 'Smart Plant Sensor', 'price' => 34.99, 'description' => 'Monitor soil moisture and light.', 'category' => 'Home and Garden'],
            ['name' => 'Yoga Mat Premium', 'price' => 29.99, 'description' => 'Non-slip premium yoga mat.', 'category' => 'Sports and Fitness'],
            ['name' => 'Web Development Guide', 'price' => 24.99, 'description' => 'Complete guide to web development.', 'category' => 'Books'],
        ];

        foreach ($productsData as $prodData) {
            $product = new Product();
            $product->setName($prodData['name']);
            $product->setPrice($prodData['price']);
            $product->setDescription($prodData['description']);
            $product->setCategory($categories[$prodData['category']]);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
