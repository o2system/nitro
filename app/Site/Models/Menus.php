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

namespace Site\Models;

// ------------------------------------------------------------------------

use O2System\Framework\Models\Sql\Model;

/**
 * Class Menus
 * @package Site\Models
 */
class Menus extends Model
{
    public $table = 'site_menus';

    public function getWhere($condition)
    {
        $result = $this->qb
            ->from($this->table)
            ->where($condition)
            ->orderBy([
                'record_left' => 'ASC',
                'record_ordering' => 'ASC'
            ])
            ->get();

        return $result;
    }
}