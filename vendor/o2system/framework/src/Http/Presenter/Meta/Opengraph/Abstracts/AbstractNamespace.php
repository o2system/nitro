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

namespace O2System\Framework\Http\Presenter\Meta\Opengraph\Abstracts;

// ------------------------------------------------------------------------

use O2System\Html\Element;
use O2System\Spl\Patterns\Structural\Repository\AbstractRepository;

/**
 * Class AbstractNamespace
 *
 * @package O2System\Framework\Http\Presenter\Meta\Opengraph
 */
abstract class AbstractNamespace extends AbstractRepository
{
    /**
     * AbstractNamespace::$namespace
     *
     * @var string
     */
    public $namespace = 'og';

    // ------------------------------------------------------------------------

    /**
     * AbstractNamespace::setObject
     *
     * @param string $property
     * @param string $content
     *
     * @return static
     */
    public function setObject($property, $content)
    {
        $property = $this->namespace . ':' . $property;

        $element = new Element('meta');

        $element->attributes[ 'name' ] = $property;
        $element->attributes[ 'content' ] = (is_array($content) ? implode(', ', $content) : trim($content));

        $this->store($property, $element);

        return $this;
    }
}