<?php
/**
 * This file is part of the O2System Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */

// ------------------------------------------------------------------------

namespace App\Install\Controllers;

// ------------------------------------------------------------------------

use App\Install\Http\Controller;

/**
 * Class Install
 * @package App\Install\Controllers
 */
class Install extends Controller
{
    /**
     * Install::index
     */
    public function index()
    {
        view('index');
    }
}
