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

namespace App\Panel\Controllers;

// ------------------------------------------------------------------------

use App\Panel\Http\AccessControl\Controllers\AuthorizedController;

/**
 * Class People
 * @package App\Panel\Controllers
 */
class People extends AuthorizedController
{
    /**
     * People::$model
     * @var string|\O2System\Framework\Models\Sql\System\People::class
     */
    public $model ='O2System\Framework\Models\Sql\System\People';

    // ------------------------------------------------------------------------

    /**
     * People::index
     */
    public function index()
    {
        if ($keyword = input()->get('keyword')) {
            $this->model->qb->like('fullname', $keyword);
        }

        $people = $this->model->all();

        view('people/index', ['peoples' => $people]);
    }

    // ------------------------------------------------------------------------

    /**
     * People::form
     * @param null $id
     * @throws \O2System\Spl\Exceptions\Logic\BadFunctionCall\BadDependencyCallException
     */
    public function form($id = null)
    {
        $people = $this->model->find($id);

        if ($post = input()->post()) {
            if ($id == null) {
                $this->model->insert($post);
                redirect_url('people');
            } else {
                $this->model->update($post);
                redirect_url('people');
            }
        }

        view('people/form', ['people' => $people]);
    }
    // ------------------------------------------------------------------------

    /**
     * People::detail
     * @param $id
     */
    public function detail($id)
    {
        $people = $this->model->find($id);

        view('people/detail', ['people' => $people]);
    }
    // ------------------------------------------------------------------------

    /**
     * People::delete
     * @param $id
     */
    public function delete($id)
    {
        if ($this->model->softDelete($id)) {
            redirect_url('people');
        }
    }
}
