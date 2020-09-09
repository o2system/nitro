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
 * Class Banks
 * @package App\Models\Master
 */
class Banks extends Model
{
    /**
     * Banks::$table
     *
     * @var string
     */
    public $table = 'tm_banks';

    // ------------------------------------------------------------------------

    /**
     * Banks::$createValidationRules
     *
     * @var array
     */
    public $insertValidationRules = [
        'name' => 'optional',
        'alias' => 'optional',
        'company' => 'required',
        'code' => 'required',
    ];

    // ------------------------------------------------------------------------

    /**
     * Banks::$createValidationCustomErrors
     *
     * @var array
     */
    public $insertValidationCustomErrors = [
        'company' => [
            'required' => 'Company cannot be empty!',
        ],
        'code' => [
            'required' => 'Code cannot be empty!',
        ],

    ];

    // ------------------------------------------------------------------------

    /**
     * Banks::$updateValidationRules
     *
     * @var array
     */
    public $updateValidationRules = [
        'id' => 'required|integer',
        'name' => 'optional',
        'alias' => 'optional',
        'company' => 'required',
        'code' => 'required',
    ];

    // ------------------------------------------------------------------------

    /**
     * Banks::$updateValidationCustomErrors
     *
     */
    public $updateValidationCustomErrors = [
        'id' => [
            'required' => 'Bank id cannot be empty!',
            'integer' => 'Bank id data must be an integer'
        ],
        'company' => [
            'required' => 'Company cannot be empty!',
        ],
        'code' => [
            'required' => 'Code cannot be empty!',
        ],
    ];

    /**
     * Banks::logo
     *
     * @return string
     */
    public function logo(): string
    {
        if (is_file($filePath = PATH_STORAGE . 'images/bank/' . dash(strtolower($this->row->alias)))) {
            return images_url($filePath);
        }
        return images_url('default/logo.png');
    }
}
