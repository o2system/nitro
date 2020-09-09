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

namespace App\Models;

// ------------------------------------------------------------------------

use App\Models\Master\Geodirectories;
use O2System\Framework\Models\Sql\Model;

/**
 * Class Addresses
 * @package App\Models
 */
class Addresses extends Model
{
    /**
     * Addresses::$table
     *
     * @var string
     */
    public $table = 'people_addresses';

    // ------------------------------------------------------------------------
    /**
     * Addresses::$createValidationRules
     *
     * @var array
     */
    public $insertValidationRules = [
        'id_people' => 'required|integer',
        'id_geodirectory' => 'required|integer',
        'label' => 'required',
        'receiver' => 'required',
        'phone' => 'required',
        'line_1' => 'required',
        'line_2' => 'optional',
        'postal' => 'optional',
        'record_primary' => 'required|listed[YES, NO]',
        'record_type' => 'optional|listed[COMPANY, PEOPLE]'
    ];

    // ------------------------------------------------------------------------

    /**
     * Addresses::$createValidationCustomErrors
     *
     * @var array
     */
    public $insertValidationCustomErrors = [
        'id_people' => [
            'required' => 'People ID cannot be empty!',
            'integer' => 'People id data must be an integer'
        ],
        'id_geodirectory' => [
            'required' => 'Geo Directory id cannot be empty!',
            'integer' => 'Geo Directory id data must be an integer'
        ],
        'label' => [
            'required' => 'Label cannot be empty!',
        ],
        'receiver' => [
            'required' => 'Receiver cannot be empty!',
        ],
        'phone' => [
            'required' => 'Phone cannot be empty!',
        ],
        'line_1' => [
            'required' => 'Line 1 cannot be empty!',
        ],
        'record_primary' => [
            'required' => 'record primary cannot be empty!',
            'listed' => 'Record primary must be listed: YES or NO'
        ],
        'record_type' => [
            'required' => 'record type cannot be empty!',
            'listed' => 'Record primary must be listed: COMPANY or PEOPLE'
        ],

    ];

    // ------------------------------------------------------------------------

    /**
     * Addresses::$updateValidationRules
     *
     * @var array
     */
    public $updateValidationRules = [
        'id' => 'required|integer',
        'id_people' => 'required|integer',
        'id_geodirectory' => 'required|integer',
        'label' => 'required',
        'receiver' => 'required',
        'phone' => 'required',
        'line_1' => 'required',
        'line_2' => 'optional',
        'postal' => 'optional',
        'record_primary' => 'required|listed[YES, NO]',
        'record_type' => 'optional|listed[COMPANY, PEOPLE]'
    ];

    // ------------------------------------------------------------------------

    /**
     * Addresses::$updateValidationCustomErrors
     *
     */
    public $updateValidationCustomErrors = [
        'id' => [
            'required' => 'Currency id cannot be empty!',
            'integer' => 'Currency id data must be an integer'
        ],
        'id_people' => [
            'required' => 'People ID cannot be empty!',
            'integer' => 'People id data must be an integer'
        ],
        'id_geodirectory' => [
            'required' => 'Geo Directory id cannot be empty!',
            'integer' => 'Geo Directory id data must be an integer'
        ],
        'label' => [
            'required' => 'Label cannot be empty!',
        ],
        'receiver' => [
            'required' => 'Receiver cannot be empty!',
        ],
        'phone' => [
            'required' => 'Phone cannot be empty!',
        ],
        'line_1' => [
            'required' => 'Line 1 cannot be empty!',
        ],
        'record_primary' => [
            'required' => 'record primary cannot be empty!',
            'listed' => 'Record primary must be listed: YES or NO'
        ],
        'record_type' => [
            'required' => 'record type cannot be empty!',
            'listed' => 'Record primary must be listed: COMPANY or PEOPLE'
        ],
    ];

    // ------------------------------------------------------------------------

    /**
     * Addresses::geodirectory
     *
     * @return bool|\O2System\Framework\Models\Sql\DataObjects\Result
     */
    public function geodirectory()
    {
        return $this->belongsTo(Geodirectories::class);
    }

    // ------------------------------------------------------------------------

    /**
     * Addresses::main
     *
     * Get main address by people.
     *
     * @param $idPeople
     * @return bool|\O2System\Framework\Models\Sql\DataObjects\Result
     */
    public function getMain($idPeople)
    {
        $address = $this->findWhere([
            'id_people' => $idPeople,
            'main_address' => 'YES',
        ])->first();

        return $address->id ?? null;
    }

    // ------------------------------------------------------------------------
}
