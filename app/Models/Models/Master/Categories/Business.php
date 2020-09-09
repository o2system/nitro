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

namespace App\Models\Master\Categories;

// ------------------------------------------------------------------------

use O2System\Framework\Models\Sql\Model;
use O2System\Framework\Models\Sql\Traits\HierarchicalTrait;

/**
 * Class Business
 * @package App\Models\Master\Categories
 */
class Business extends Model
{
    use HierarchicalTrait;

    /**
     * Business::$table
     *
     * @var string
     */
    public $table = 'tm_categories_business';

    // ------------------------------------------------------------------------
    /**
     * Business::$createValidationRules
     *
     * @var array
     */
    public $insertValidationRules = [
        'id_parent' => 'required',
        'title' => 'required',
    ];

    // ------------------------------------------------------------------------

    /**
     * Business::$createValidationCustomErrors
     *
     * @var array
     */
    public $insertValidationCustomErrors = [
        'id_parent' => [
            'required' => 'Parent id cannot be empty!',
            'integer' => 'Business id data must be an integer'
        ],
        'title' => [
            'required' => 'Title cannot be empty!',
        ],

    ];

    // ------------------------------------------------------------------------

    /**
     * Business::$updateValidationRules
     *
     * @var array
     */
    public $updateValidationRules = [
        'id' => 'required|integer',
        'id_parent' => 'required',
        'title' => 'required',
    ];

    // ------------------------------------------------------------------------

    /**
     * Business::$updateValidationCustomErrors
     *
     */
    public $updateValidationCustomErrors = [
        'id' => [
            'required' => 'Business id cannot be empty!',
            'integer' => 'Business id data must be an integer'
        ],
        'id_parent' => [
            'required' => 'Parent id cannot be empty!',
            'integer' => 'Business id data must be an integer'
        ],
        'title' => [
            'required' => 'Title cannot be empty!',
        ],
    ];
}
