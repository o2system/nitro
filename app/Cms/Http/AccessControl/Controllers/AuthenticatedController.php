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

namespace App\Cms\Http\AccessControl\Controllers;

// ------------------------------------------------------------------------

use App\Cms\Http\AccessControl\Middleware\UserAuthentication;
use App\Cms\Http\Controller;

/**
 * Class AuthenticatedController
 *
 * @package App\Cms\Http\AccessControl\Controllers
 */
class AuthenticatedController extends Controller
{
    /**
     * AuthenticatedController::__construct
     */
    public function __reconstruct()
    {
        parent::__reconstruct();

        // Register user authentication middleware
        $this->middleware->register( new UserAuthentication() );
    }
}