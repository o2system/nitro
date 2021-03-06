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

namespace O2System\Framework\Libraries\Ui\Components\Navs;

// ------------------------------------------------------------------------
use O2System\Framework\Libraries\Ui\Contents\Image;
use O2System\Framework\Libraries\Ui\Contents\Link;
use O2System\Framework\Libraries\Ui\Element;

/**
 * Class Bullets
 *
 * @package O2System\Framework\Libraries\Ui\Components\Navs
 */
class Bullets extends Base
{
    /**
     * Bullets::__construct
     */
    public function __construct()
    {
        parent::__construct();

        $this->attributes->addAttributeClass('nav-bullets');
    }

    // ------------------------------------------------------------------------

    /**
     * Bullets::createBullet
     *
     * @param string        $bullet
     * @param string|null   $href
     *
     * @return \O2System\Framework\Libraries\Ui\Contents\Lists\Item
     */
    public function createBullet($bullet, $href = null)
    {
        if (strpos($bullet, 'http') || is_file($bullet)) {
            $icon = new Image($bullet);
        } else {
            $icon = new Element('i', 'bullet');
            $icon->attributes->addAttributeClass($bullet);
        }

        $link = new Link($icon, $href);
        $link->attributes->addAttributeClass('nav-link');

        return $this->createList($link);
    }

    // ------------------------------------------------------------------------

    /**
     * Bullets::justified
     *
     * @return static
     */
    public function justified()
    {
        $this->attributes->addAttributeClass('nav-justified');

        return $this;
    }

    // ------------------------------------------------------------------------

    /**
     * Bullets::verticalStacked
     *
     * @return static
     */
    public function verticalStacked()
    {
        $this->attributes->addAttributeClass('nav-stacked');

        return $this;
    }
}