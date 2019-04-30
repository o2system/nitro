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

namespace Personal\Controllers;

// ------------------------------------------------------------------------

use Personal\Http\Controller;

/**
 * Class Personal
 *
 * @package Personal\Controllers
 */
class Personal extends Controller
{
    /**
     * Profile::index
     */
    public function index()
    {
        ( new Profile() )->index();
    }
}