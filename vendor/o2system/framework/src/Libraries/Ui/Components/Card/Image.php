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

namespace O2System\Framework\Libraries\Ui\Components\Card;

// ------------------------------------------------------------------------

use O2System\Framework\Libraries\Ui\Components\Card\Image\Overlay;

/**
 * Class Image
 *
 * @package O2System\Framework\Libraries\Ui\Components\Card
 */
class Image extends \O2System\Framework\Libraries\Ui\Contents\Image
{
    /**
     * Image::__construct
     *
     * @param string|null $src
     * @param string|null $alt
     */
    public function __construct($src = null, $alt = null)
    {
        parent::__construct($src, $alt);
        $this->attributes->addAttributeClass('img-fluid');
    }

    // ------------------------------------------------------------------------

    /**
     * Image::createOverlay
     *
     * @return Overlay
     */
    public function createOverlay()
    {
        $this->childNodes->push(new Overlay());

        return $this->childNodes->last();
    }

    // ------------------------------------------------------------------------

    /**
     * Image::render
     *
     * @return string
     */
    public function render()
    {
        $output[] = $this->open();

        if ($this->hasChildNodes()) {
            $output[] = implode(PHP_EOL, $this->childNodes->getArrayCopy());
        }

        return implode(PHP_EOL, $output);
    }
}