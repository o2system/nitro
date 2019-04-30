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
 * Class UsersManagement
 *
 * @package App\Controllers
 */
class UsersManagement extends Controller
{
    /**
     * Index
     */
    public function index()
    {    
        presenter()->theme->setLayout( 'admin' );
        view('users/index');
    }

    public function form()
    {    
        presenter()->theme->setLayout( 'admin' );
        view('users/form');
    }
}