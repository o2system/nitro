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

namespace O2System\Framework\Http\Controllers\System\Users;

// ------------------------------------------------------------------------

use O2System\Framework\Http\Controllers\Restful;
// ------------------------------------------------------------------------
/**
 * Class Actions
 * @package O2System\Framework\Http\Controllers\System\Users
 */
class Actions extends Restful
{
    /**
     * Actions::$model
     *
     * @var string
     */
    public $model = '\O2System\Framework\Models\Sql\System\Users\Actions';


    /**
     * Actions::$getValidationRules
     *
     * @var array
     */
    public $getValidationRules = [
        'id_sys_user' => 'optional|integer',
    ];

    // ------------------------------------------------------------------------

    /**
     * Actions::$getValidationCustomErrors
     *
     * @var array
     */
    public $getValidationCustomErrors = [
        'id_sys_user' => [
            'integer' => 'System User data must be an integer'
        ],
    ];

    // ------------------------------------------------------------------------

    /**
     * Actions::$searchableColumns
     *
     * @var array
     */
    public $searchableColumns = [
        'action_model',
    ];
}
