<?php
/**
 * This file is part of the O2System Content Management System package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian
 * @copyright      Copyright (c) Steeve Andrian
 */
// ------------------------------------------------------------------------

namespace Site\Http\Presenter;

// ------------------------------------------------------------------------

use O2System\Spl\Datastructures\SplArrayObject;
use O2System\Spl\Iterators\ArrayIterator;
use O2System\Psr\Patterns\Structural\Repository\AbstractRepository;

/**
 * Class Menus
 *
 * @package Site\Http\Presenter
 */
class Menus extends AbstractRepository
{
    /**
     * Menus::__construct
     */
    public function __construct()
    {
        $model = new \Site\Models\Menus();

        foreach (['NAVBAR', 'SIDEBAR', 'FOOTER'] as $position) {
            $result = $model->getWhere([
                'position' => $position,
                'record_status' => 'PUBLISH'
            ]);
            if ($result->count()) {
                $menu = new ArrayIterator();
                foreach ($result as $row) {
                    $menu[ $row->href ] = new SplArrayObject([
                        'label'       => $row->label,
                        'description' => $row->description,
                        'href'        => (strpos($row->href, 'http') !== false ? $row->href : base_url($row->href)),
                        'attributes'  => $row->attributes,
                        'settings'    => $row->settings,
                        'metadata'    => $row->metadata,
                    ]);
                }

                $this->store(strtolower($position), $menu);
            }
        }
    }
}