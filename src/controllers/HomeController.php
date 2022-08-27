<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\ProductHandler;
use src\handlers\ProviderHandler;

class HomeController extends Controller {

    public function index() {

        $providers = ProviderHandler::getProviders();
        $products = ProductHandler::getProducts();

        $this->render('home', [
            'providers' => $providers,
            'products' => $products
        ]);
    }

    public function newProvider()
    {
        $provider = filter_input(INPUT_POST,'name');
        $category1 = filter_input(INPUT_POST,'category1');
        $category2 = filter_input(INPUT_POST,'category2');
        $category3 = filter_input(INPUT_POST,'category3');

        if ($category1 && $provider && $category2 && $category3)
        {
            ProviderHandler::newProvider($provider, $category1, $category2,$category3);
        }
        $this->redirect('/');
    }

    public function newProduct()
    {
        $name = filter_input(INPUT_POST,'name');
        $provider = filter_input(INPUT_POST,'provider');
        $category = filter_input(INPUT_POST,'category');
        $price = filter_input(INPUT_POST,'price');

        if ($name && $provider && $category && $price)
        {
            ProductHandler::addProduct($name,$provider,$category,$price);
        }

        $this->redirect('/');
    }

    public function deleteProduct($data)
    {
        ProductHandler::deleteProduct($data['id']);

        $this->redirect('/');
    }

    public function editProduct($data)
    {
        $id = $data['id'];

        if (!empty($id))
        {
            $providers = ProviderHandler::getProviders();
            $product = ProductHandler::getProduct($id);

            if ($product == false)
            {
                $this->redirect('/');
            }

            $this->render('editProduct',
                [
                    'product' => $product,
                    'providers' => $providers
                ]);
        }

    }

    public function editAction()
    {
        $id = filter_input(INPUT_POST,'id');
        $name = filter_input(INPUT_POST,'name');
        $provider = filter_input(INPUT_POST,'provider');
        $category = filter_input(INPUT_POST,'category');
        $price = filter_input(INPUT_POST,'price');

        if ($name && $provider && $category && $price)
        {
            ProductHandler::updateProduct($id,$name,$provider,$category,$price);
        }

        $this->redirect('/');
    }
}