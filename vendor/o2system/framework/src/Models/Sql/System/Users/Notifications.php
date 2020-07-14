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

namespace O2System\Framework\Models\Sql\System\Users;

// ------------------------------------------------------------------------

use O2System\Framework\Models\Sql\System\Users;
use O2System\Framework\Models\Sql\Model;
use O2System\Framework\Models\Sql\Traits\MetadataTrait;
use O2System\Security\Authentication\User;
use O2System\Spl\DataStructures\SplArrayObject;

/**
 * Class Notifications
 * @package O2System\Framework\Models\Sql\System\Users
 */
class Notifications extends Model
{
    /**
     * Notifications::$table
     *
     * @var string
     */
    public $table = 'sys_users_notifications';

    /**
     * Notifications::$appendColumns
     *
     * @var array
     */
    public $appendColumns = [
        'sender',
        'ownership'
    ];

    // ------------------------------------------------------------------------

    /**
     * Notifications::user
     *
     * @return bool|\O2System\Framework\Models\Sql\DataObjects\Result\Row
     */
    public function user()
    {
        models(Users::class)->hideColumns = [
            'pin',
            'password'
        ];

        return $this->belongsTo(Users::class);
    }

    // ------------------------------------------------------------------------

    /**
     * Notifications::sender
     *
     * @return bool|\O2System\Framework\Models\Sql\DataObjects\Result\Row
     */
    public function sender()
    {
        models(Users::class)->hideColumns = [
            'pin',
            'password'
        ];

        if($result = $this->belongsTo(Users::class, 'id_sys_user_sender')) {
            return $result;
        }

        return new SplArrayObject([
            'username' => 'system',
            'email' => 'noreply@' . domain_url(),
            'profile' => new SplArrayObject([
                'fullname' => 'System',
                'avatar_url' => images_url(PATH_STORAGE . 'images/default/avatar-system.png'),
                'cover_url' => images_url(PATH_STORAGE . 'images/default/cover-system.png'),
            ])
        ]);
    }

    // ------------------------------------------------------------------------

    /**
     * Notifications::hyperlink_url
     *
     * @return string
     */
    public function hyperlink_url()
    {
        if(empty($this->row->hyperlink)) {
            return 'javascript:void(0);';
        } elseif(strpos($this->row->hyperlink, 'http') === false) {
            return base_url($this->row->hyperlink);
        }

        return $this->row->hyperlink;
    }

    // ------------------------------------------------------------------------

    /**
     * Notifications::reference
     *
     * @return array|bool|\O2System\Framework\Models\Sql\DataObjects\Result\Row
     */
    public function reference()
    {
        return $this->morphTo();
    }
}