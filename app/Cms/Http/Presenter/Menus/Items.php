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

namespace App\Cms\Http\Presenter\Menus;

// ------------------------------------------------------------------------

use O2System\Spl\Patterns\Structural\Repository\AbstractRepository;

/**
 * Class Items
 * @package App\Cms\Http\Presenter\Menus
 */
class Items extends AbstractRepository
{
    public function render()
    {
        return implode(PHP_EOL, $this->getArrayCopy() );
    }

    public function __toString()
    {
        return $this->render();
    }
}