<?php
/**
 * This file is part of the O2System Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */

// ------------------------------------------------------------------------

namespace App\Install\Http;

// ------------------------------------------------------------------------

/**
 * Class Controller
 * @package App\Install\Http
 */
class Controller extends \App\Http\Controller
{
    /**
     * Controller::__reconstruct
     */
    public function __reconstruct()
    {
        parent::__reconstruct();

        presenter()->theme->setLayout('blank');
    }
}
