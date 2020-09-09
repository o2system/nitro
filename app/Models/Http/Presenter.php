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

namespace App\Http;

// ------------------------------------------------------------------------

use O2System\Framework\Libraries\Ui\Contents\Icon;
use O2System\Framework\Libraries\Ui\Contents\Link;
use O2System\Framework\Models\Sql\System\Modules;

/**
 * Class Presenter
 * @package App\Http
 */
class Presenter extends \O2System\Framework\Http\Presenter
{
    /**
     * Presenter::__construct
     */
    public function __construct()
    {
        parent::__construct();

        $this->meta->offsetSet('generator', 'O2System Nitro Boilerplate');

        if ($app = models(Modules::class)->find(rtrim(globals()->app->getNamespace(), '\\'), 'namespace')) {
            globals()->app->id = $app->id;
            globals()->app->settings = $app->settings;
        }

        $this->page->breadcrumb->createList($home = new Link(
            language('HOME'), base_url()
        ));

        $icon = new Icon();
        $icon->attributes->addAttributeClass('czi-home');
        $home->setIcon($icon);
    }
}