<?php
/**
 * This file is part of the O2System Content Management System package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian
 * @copyright      Copyright (c) Steeve Andrian
 */
// ------------------------------------------------------------------------

namespace Site\Http;

// ------------------------------------------------------------------------

use Site\Http\Presenter;

/**
 * Class Controller
 * @package Site\Http
 */
class Controller extends \O2System\Framework\Http\Controller
{
    /**
     * Controller::__construct
     */
    public function __construct()
    {
        presenter()->store('page', new Presenter\Page());
        presenter()->store('menus', new Presenter\Menus());
        presenter()->store('settings', new Presenter\Settings());
        presenter()->store( 'app', modules()->getApp( 'site' )->getProperties() );

        $this->presenter->meta->title->prepend( presenter()->settings->name );
    }
}