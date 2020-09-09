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
 * Class Countries
 * @package App\Models\Master
 */
class Countries extends Model
{
    /**
     * Countries::$table
     *
     * @var string
     */
    public $table = 'tm_countries';

    // ------------------------------------------------------------------------
    /**
     * Countries::$createValidationRules
     *
     * @var array
     */
    public $insertValidationRules = [
        'name' => 'required',
        'code_string' => 'required',
        'code_iso' => 'required',
        'code_phone' => 'required'
    ];

    // ------------------------------------------------------------------------

    /**
     * Countries::$createValidationCustomErrors
     *
     * @var array
     */
    public $insertValidationCustomErrors = [
        'name' => [
            'required' => 'Iso cannot be empty!',
        ],
        'code_string' => [
            'required' => 'String Code cannot be empty!',
        ],
        'code_iso' => [
            'required' => 'ISO Code cannot be empty!',
        ],
        'code_phone' => [
            'required' => 'Phone Code cannot be empty!',
        ],

    ];

    // ------------------------------------------------------------------------

    /**
     * Countries::$updateValidationRules
     *
     * @var array
     */
    public $updateValidationRules = [
        'id' => 'required|integer',
        'name' => 'required',
        'code_string' => 'required',
        'code_iso' => 'required',
        'code_phone' => 'required'
    ];

    // ------------------------------------------------------------------------

    /**
     * Countries::$updateValidationCustomErrors
     *
     */
    public $updateValidationCustomErrors = [
        'id' => [
            'required' => 'Country id cannot be empty!',
            'integer' => 'Country id data must be an integer'
        ],
        'name' => [
            'required' => 'Iso cannot be empty!',
        ],
        'code_string' => [
            'required' => 'String Code cannot be empty!',
        ],
        'code_iso' => [
            'required' => 'ISO Code cannot be empty!',
        ],
        'code_phone' => [
            'required' => 'Phone Code cannot be empty!',
        ],
    ];
}
