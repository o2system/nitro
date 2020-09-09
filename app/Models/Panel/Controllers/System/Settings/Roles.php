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
use O2System\Kernel\DataStructures\Input\Data;

/**
 * Class Roles
 * @package App\Panel\Controllers\Settings
 */
class Roles extends Controller
{
    /**
     * Roles::index
     *
     * @var string|\O2System\Framework\Models\Sql\System\Modules\Roles::class
     */
    public $model = 'O2System\Framework\Models\Sql\System\Modules\Roles';

    // ------------------------------------------------------------------------
    /**
     * Roles::index
     */
    public function index()
    {
        $roles = $this->model->all();

        view('system/settings/roles/index', ['roles' => $roles]);
    }

    // ------------------------------------------------------------------------

    /**
     * Roles::form
     *
     * @param null $id
     * @throws \O2System\Spl\Exceptions\Logic\BadFunctionCall\BadDependencyCallException
     */
    public function form($id = null)
    {
        $role = $this->model->find($id);

        if ($post = input()->post()) {
            if ($id == null) {
                $this->model->insert($post);
                redirect_url('system/settings/roles');
            } else {
                $this->model->update($post);
                redirect_url('system/settings/roles');
            }
        }

        view('system/settings/roles/form', ['role' => $role]);
    }


    // ------------------------------------------------------------------------
    /**
     * Roles::detail
     *
     * @param $id
     */
    public function detail($id)
    {
        $role = $this->model->find($id);

        view('system/settings/roles/detail', ['role ' => $role]);
    }

    // ------------------------------------------------------------------------
    /**
     * Roles::delete
     *
     * @param $id
     * @throws \O2System\Spl\Exceptions\Logic\BadFunctionCall\BadDependencyCallException
     */
    public function delete($id)
    {
        if ($role = $this->model->find($id)) {
            $this->model->update(new Data([
                'id' => $id,
                'record_status' => 'DELETED'
            ]));
        }

        redirect_url('system/settings/roles');
    }
}
