<?php


namespace App\Site\Controllers;


use App\Panel\Modules\Store\Models\Products;
use App\Site\Http\Controller;

/**
 * Class Product
 * @package App\Site\Controllers
 */
class Product extends Controller
{

    public function index()
    {
        return 'haha';
    }

    /**
     * @param $slug
     */
    public function detail($slug)
    {
        $product =  models(Products::class)->findWhere(['slug' => $slug])->first();

        view('products/detail', [
            'product' => $product,
            'products' => models(Products::class)->all(),
        ]);

    }

}