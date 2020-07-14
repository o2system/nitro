<?php
/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

namespace App\Site\Controllers;

// ------------------------------------------------------------------------

use App\Panel\Modules\Store\Models\Products;
use App\Panel\Modules\Store\Models\Settings\MasterData\Brands;
use App\Site\Http\Controller;

/**
 * Class Home
 *
 * @package App\Site\Controllers
 */
class Home extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        presenter()->page->setHeader( 'hello world' );

        models(Products::class)->qb->where('record_type', 'PRODUCT');
        $products = models(Products::class)->all();

        models(Products::class)->qb->where('record_type', 'SLIDER');
        $sliders = models(Products::class)->all();

        view('homepage', [
            'products' => $products,
            'sliders' => $sliders,
            'brands' => models(Brands::class)->all()
        ]);
    }
}