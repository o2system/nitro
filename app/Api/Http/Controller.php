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

namespace App\Api\Http;

// ------------------------------------------------------------------------

use App\Api\Http\AccessControl\Middleware\WebToken;
use O2System\Framework\Http\Controllers\Restful;

/**
 * Class Controller
 * @package App\Api\Http
 */
class Controller extends Restful
{
    /**
     * Controller::__reconstruct
     */
    public function __reconstruct()
    {
        middleware()->register(new WebToken());
    }
}
