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

// --------------------------------------------------------------------------------------

use App\Cms\Http\AccessControl\Controllers\AuthenticatedController;

/**
 * Class Stats
 *
 * @package App\Cms\Controllers
 */
class Stats extends AuthenticatedController
{
    /**
     * Dashboard::index
     */
    public function index()
    {
        $this->view->load( 'stats' );
    }
}
