<?php

namespace src\handlers;

use src\models\Provider;

class ProviderHandler
{
    public static function getProviders()
    {
        $data = Provider::select()->get();
        $providers = [];

        if (!empty($data)) {
            foreach ($data as $provider) {
                $newProvider = new Provider();
                $newProvider->id = $provider['id'];
                $newProvider->name = $provider['name'];

                $providers[] = $newProvider;
            }
        }
        return $providers;
    }

    public static function newProvider($name, $category1, $category2, $category3)
    {
        Provider::insert([
            'name' => $name,
            'category1' => $category1,
            'category2' => $category2,
            'category3' => $category3
        ])->execute();

        return true;
    }
}