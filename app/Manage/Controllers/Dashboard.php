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

namespace App\Manage\Controllers;

// ------------------------------------------------------------------------

use App\Manage\Http\AccessControl\Controllers\AuthenticatedController;
use App\Api\Modules\Companies\Models\Companies;
use App\Api\Modules\Testimonials\Models\Testimonials;
use App\Api\Modules\Transactions\Models\Logs;

/**
 * Class Dashboard
 *
 * @package App\Controllers
 */
class Dashboard extends AuthenticatedController
{
    /**
     * Index
     */
    public function index()
    {
        presenter()->page->setHeader( 'Dashboard' );

        view('dashboard/index');
    }

    public function logout()
    {
        services( 'user' )->logout();
        redirect_url('login');
    }
}