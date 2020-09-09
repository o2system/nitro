<?php
/**
 * This file is part of the WebIn Platform.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         PT. Lingkar Kreasi (Circle Creative)
 * @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */

// ------------------------------------------------------------------------

namespace App\Models\Master;

// ------------------------------------------------------------------------

use O2System\Framework\Models\Sql\Model;

/**
 * Class Currencies
 * @package App\Models\Master
 */
class Currencies extends Model
{
    /**
     * Currencies::$table
     *
     * @var string
     */
    public $table = 'tm_currencies';

    // ------------------------------------------------------------------------
    /**
     * Currencies::$createValidationRules
     *
     * @var array
     */
    public $insertValidationRules = [
        'iso' => 'required',
        'name' => 'required',
    ];

    // ------------------------------------------------------------------------

    /**
     * Currencies::$createValidationCustomErrors
     *
     * @var array
     */
    public $insertValidationCustomErrors = [
        'iso' => [
            'required' => 'Iso cannot be empty!',
        ],
        'name' => [
            'required' => 'Name cannot be empty!',
        ],

    ];

    // ------------------------------------------------------------------------

    /**
     * Currencies::$updateValidationRules
     *
     * @var array
     */
    public $updateValidationRules = [
        'id' => 'required|integer',
        'iso' => 'required',
        'name' => 'required',
    ];

    // ------------------------------------------------------------------------

    /**
     * Currencies::$updateValidationCustomErrors
     *
     */
    public $updateValidationCustomErrors = [
        'id' => [
            'required' => 'Currency id cannot be empty!',
            'integer' => 'Currency id data must be an integer'
        ],
        'iso' => [
            'required' => 'Iso cannot be empty!',
        ],
        'name' => [
            'required' => 'Name cannot be empty!',
        ],
    ];
}
