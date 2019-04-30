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

use O2System\Framework\Libraries\Ui\Contents\Link;
use Personal\Http\Controller;

/**
 * Class Setting
 *
 * @package Personal\Controllers
 */
class Setting extends Controller
{
    /**
     * Setting::index
     */
    public function index()
    {
        $this->presenter->page
            ->setHeader( 'Setting' )
            ->setDescription( 'The Personal Setting' );

        $this->presenter->page->breadcrumb->createList( new Link( language()->getLine( 'SETTING' ), base_url( 'personal/setting' ) ) );

        $this->view->load('setting');
    }
}