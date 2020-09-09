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

namespace App\Panel\Controllers\System\Settings;

// ------------------------------------------------------------------------

use App\Panel\Controllers\System\Settings as Controller;
use O2System\Framework\Models\Sql\System\Users as UsersModel;
use O2System\Kernel\DataStructures\Input\Data;

/**
 * Class Users
 * @package App\Panel\Controllers\Settings
 */
class Users extends Controller
{
    /**
     * Users::$model
     *
     * @var string|\O2System\Framework\Models\Sql\System\People::class
     */
    public $model = 'O2System\Framework\Models\Sql\System\People';

    /**
     * Users::index
     */
    public function index()
    {
        view('system/settings/users/index');
    }

    // ------------------------------------------------------------------------

    /**
     * Users::form
     */
    public function form()
    {
        $id = $this->session->account->profile->id;
        $allowUpdateUsername = true;
        $profile = $this->model->find($id);
        $master = models(UsersModel::class)->find($this->session->account->id);

        /** Update */
        if ($post = input()->post()) {

            /**
             * Username check.
             */
            $result = models(UsersModel::class)->findWhere([
                'username' => $post['username'],
            ]);

            if ($result->count()) {
                if ($result[0]->username == $master->username) {
                    $allowUpdateUsername = true;
                } else {
                    $allowUpdateUsername = false;
                }
            }

            /** Update username */
            if ($allowUpdateUsername) {
                models(UsersModel::class)->update(new Data(['username' => $post['username']]), ['id' => $this->session->account->id]);
            } else {
                session()->setFlash('danger', language('USERNAME IS USED BY OTHER'));

                redirect_url($_SERVER['HTTP_REFERER']);
            }

            /** Update people */
            $test = $this->model->update(new Data([
                'id' => $profile->id,
                'fullname' => $post['fullname'],
                'avatar' => $post['avatar'],
                'cover' => $post['cover'],
                'gender' => $post['gender'],
            ]));

            session()->setFlash('success', language('SUCCESSFULLY UPDATED'));

            redirect_url($_SERVER['HTTP_REFERER']);
        }

        view('system/settings/users/form', [
            'profile' => $profile,
            'master' => $master
        ]);
    }
}
