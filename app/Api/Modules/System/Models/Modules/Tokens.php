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

namespace App\Api\Modules\System\Models\Modules;

// ------------------------------------------------------------------------

use O2System\Framework\Models\Sql\Model;

/**
 * Class Tokens
 * @package App\Api\Modules\System\Models\Modules
 */
class Tokens extends Model
{
    /**
     * Tokens::$table
     *
     * @var string
     */
    public $table = 'sys_modules_tokens';

    /**
     * Tokens::validate
     *
     * Validates token code.
     *
     * @param string $code
     *
     * @return bool
     */
    public function validate($code)
    {
        if($result = $this->find($code, 'code')) {
            if($result->count()) {
                return true;
            }
        }

        return false;
    }
}