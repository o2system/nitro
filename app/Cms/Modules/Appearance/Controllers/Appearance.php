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

namespace App\Cms\Modules\Appearance\Controllers;

// ------------------------------------------------------------------------

use App\Cms\Http\AccessControl\Controllers\AuthorizedController;
use App\Cms\Models\System\Themes;
use O2System\Framework\Libraries\Ui\Contents\Link;

/**
 * Class Appearance
 * @package App\Controllers
 */
class Appearance extends AuthorizedController
{
    public function index()
    {
        $this->presenter->page
            ->setHeader( 'Appearance' )
            ->setDescription( 'Manage Appearance' );

        $this->presenter->page->icon->setClass( 'fa fa-image' );

        $this->presenter->page->breadcrumb->createList( new Link(
            $this->language->getLine( 'APPEARANCE' ),
            base_url( 'appearance' )
        ) );

        $themes = new Themes();
        //print_out($themes->all());

        $this->view->load( 'index' );
    }

    /**
     * Appearance::customize
     */
    public function customize()
    {
        $this->presenter->assets->loadPackage('slinky-menu');

        /**
         * @todo: create theme customize
         */

        $this->presenter->theme->setLayout( 'customize' );
        $this->view->load( 'customize' );
    }
}