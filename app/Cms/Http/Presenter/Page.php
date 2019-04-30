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

namespace App\Cms\Http\Presenter;

// ------------------------------------------------------------------------

use O2System\Framework\Libraries\Ui\Admin\Sidebar;
use O2System\Spl\Patterns\Structural\Repository\AbstractRepository;

/**
 * Class Page
 *
 * @package App\Cms\DataStructures
 */
class Page extends AbstractRepository
{
    /**
     * Page::$leftSidebar
     *
     * @var \O2System\Framework\Libraries\Ui\Admin\Sidebar
     */
    public $leftSidebar;

    // ------------------------------------------------------------------------

    /**
     * Page::__construct
     */
    public function __construct()
    {
        $this->leftSidebar = new Sidebar([
            'id' => 'sidebar-left'
        ]);
    }
}