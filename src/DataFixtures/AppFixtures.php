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
            ['name' => 'Wireless Headphones', 'price' => 79.99, 'description' => 'Premium sound quality with noise cancellation.', 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400'],
            ['name' => 'Bluetooth Speaker', 'price' => 59.99, 'description' => 'Portable speaker with deep bass.', 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=400'],
            ['name' => 'Smartphone Stand', 'price' => 19.99, 'description' => 'Adjustable aluminum stand.', 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1586953208448-b95a79798f07?w=400'],
            ['name' => 'Wireless Mouse', 'price' => 29.99, 'description' => 'Ergonomic wireless mouse.', 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1527814050087-3793815479db?w=400'],
            ['name' => 'Mechanical Keyboard', 'price' => 89.99, 'description' => 'RGB mechanical keyboard.', 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=400'],
            ['name' => 'Power Bank 20000mAh', 'price' => 39.99, 'description' => 'High capacity portable charger.', 'category' => 'Electronics', 'image' => 'https://images.unsplash.com/photo-1609091839311-d5365f9ff1c5?w=400'],
            ['name' => 'Classic Leather Jacket', 'price' => 149.99, 'description' => 'Genuine leather jacket.', 'category' => 'Fashion', 'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400'],
            ['name' => 'Smart Plant Sensor', 'price' => 34.99, 'description' => 'Monitor soil moisture and light.', 'category' => 'Home and Garden', 'image' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=400'],
            ['name' => 'Yoga Mat Premium', 'price' => 29.99, 'description' => 'Non-slip premium yoga mat.', 'category' => 'Sports and Fitness', 'image' => 'https://images.unsplash.com/photo-1601925228240-c7dc8e3c2c8c?w=400'],
            ['name' => 'Web Development Guide', 'price' => 24.99, 'description' => 'Complete guide to web development.', 'category' => 'Books', 'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400'],
        ];
        foreach ($productsData as $prodData) {
            $product = new Product();
            $product->setName($prodData['name']);
            $product->setPrice($prodData['price']);
            $product->setDescription($prodData['description']);
            $product->setImage($prodData['image']);
            $product->setCategory($categories[$prodData['category']]);
            $manager->persist($product);
        }
        $manager->flush();
    }
}
