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

namespace O2System\Framework\Cli;

// ------------------------------------------------------------------------

/**
 * Class Router
 * @package O2System\Framework\Cli
 */
class Router extends \O2System\Kernel\Cli\Router
{
    /**
     * Router::__construct
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->addFilePath(PATH_FRAMEWORK . 'Cli' . DIRECTORY_SEPARATOR);
        $this->addFilePath(PATH_APP);
    }
}