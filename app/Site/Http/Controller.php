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

namespace App\Site\Http;

// ------------------------------------------------------------------------

use O2System\Framework\Models\Sql\System\Modules;

/**
 * Class Controller
 *
 * @package App\Http
 */
class Controller extends \App\Http\Controller
{
    /**
     * Controller::__reconstruct
     */
    public function __reconstruct()
    {
        parent::__reconstruct();

        if(globals()->app->settings->site_title_position !== 'NONE') {
            switch (globals()->app->settings->site_title_position) {
                case 'BEFORE':
                    presenter()->meta->title->prepend(globals()->app->settings->site_title);
                    break;
                case 'AFTER':
                    presenter()->meta->title->append(globals()->app->settings->site_title);
                    break;
            }
        }
    }
}