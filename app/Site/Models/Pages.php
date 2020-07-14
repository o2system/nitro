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

namespace App\Site\Models;

// ------------------------------------------------------------------------

use App\Models\Posts;

/**
 * Class Pages
 * @package App\Site\Models
 */
class Pages extends Posts
{
    /**
     * Pages::find
     *
     * @param mixed $criteria
     * @param null $field
     * @param null $limit
     * @return bool|mixed|\O2System\Framework\Models\Sql\DataObjects\Result|void
     */
    public function find($criteria, $field = null, $limit = null)
    {
        $this->qb->where('record_type', 'PAGE');

        parent::find($criteria, $field, $limit);
    }
}