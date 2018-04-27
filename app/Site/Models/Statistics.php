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
use O2System\Framework\Models\Sql\Traits\ModifierTrait;

/**
 * Class Statistics
 * @package Site\Models
 */
class Statistics extends Model
{
    use ModifierTrait;

    public $table = 'site_statistics';

    public function all($fields = null, $limit = null)
    {
        $result = $this->qb
            ->select([
                'id_sys_user',
                'GROUP_CONCAT(DISTINCT ip_address)' => 'ip_address_list',
                'COUNT(DISTINCT ip_address)' => 'ip_total',
                'COUNT(id_sys_user)' => 'page_count',
                'MIN(record_create_timestamp)' => 'start_time',
                'MAX(record_create_timestamp)' => 'end_time',
            ])
            ->from($this->table)
            ->groupBy('id_sys_user')
            ->get();

        if($result) {
            return $result;
        }

        return false;
    }
}