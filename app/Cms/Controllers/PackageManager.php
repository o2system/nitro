<?php
/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 *  @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

namespace App\Cms\Controllers;

// ------------------------------------------------------------------------

use App\Cms\Http\Controller;

/**
 * Class PackageManager
 *
 * @package App\Controllers
 */
class PackageManager extends Controller
{
    /**
     * Index
     */
    public function index()
    {    
        presenter()->theme->setLayout( 'admin' );
        view('package-manager/index');
    }

    public function installer()
    {    
        presenter()->theme->setLayout( 'admin' );
        view('package-manager/installer');
    }
}