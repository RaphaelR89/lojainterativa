<?php

namespace src\handlers;

use src\models\Product;
use src\models\Provider;

class ProductHandler
{
    public static function getProducts()
    {
        $data = Product::select()->get();
        $products = [];

        if (!empty($data)) {
            foreach ($data as $product) {
                $newProduct = new Product();
                $newProduct->id = $product['id'];
                $newProduct->name = $product['name'];
                $newProduct->price = $product['price'];
                $newProduct->category = $product['category'];

                $provider = Provider::select()->where('id', $product['provider_id'])->one();

                $newProvider = new Provider();
                $newProvider->name = $provider['name'];
                $newProvider->id = $provider['id'];


                $newProduct->provider = $newProvider;


                $products[] = $newProduct;
            }
        }

        return $products;
    }

    public static function addProduct($name, $provider, $category, $price)
    {

        Product::insert([
            'name' => $name,
            'price' => $price,
            'provider_id' => $provider,
            'category' => $category
        ])->execute();


        return true;
    }

    public static function updateProduct($id, $name, $provider, $categoria, $price)
    {


       Product::update()->set([
            'name' => $name,
            'price' => intval($price),
            'provider_id' => intval($provider),
            'category' => $categoria
        ])->where('id', intval($id))
            ->execute();

        return true;
    }

    public static function deleteProduct($productId)
    {
        Product::delete()->where('id', $productId)->execute();

        return true;
    }

    public static function getProduct($id)
    {

        $product = Product::select()->where('id', intval($id))->one();
        if ($product) {

            $newProduct = new Product();
            $newProduct->id = $product['id'];
            $newProduct->name = $product['name'];
            $newProduct->price = $product['price'];

            return $newProduct;
        }

        return false;
    }
}