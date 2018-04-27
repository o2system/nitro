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

namespace Administrator\Controllers\Users;

// ------------------------------------------------------------------------

use Administrator\Http\Controller;
use O2System\Framework\Libraries\Ui\Components\Link;

/**
 * Class Manager
 *
 * @package Administrator\Controllers\Users
 */
class Manager extends Controller
{
    /**
     * Manager::index
     */
    public function index()
    {
        $this->presenter->page
            ->setHeader( 'Users Manager' )
            ->setDescription( 'The Users Manager' );

        $this->presenter->page->breadcrumb->createList( new Link( language()->getLine( 'USERS_MANAGER' ), base_url( 'administrator/users/manager' ) ) );

        $this->view->load( 'users/manager/table' );
    }

    public function form()
    {
        $this->presenter->page
            ->setHeader( 'Users Manager' )
            ->setDescription( 'The Users Manager' );

        $this->presenter->page->breadcrumb->createList( new Link( language()->getLine( 'USERS_MANAGER' ), base_url( 'administrator/users/manager/form' ) ) );

        $this->view->load( 'users/manager/form' );
    }
}