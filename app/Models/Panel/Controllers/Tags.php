<?php

/**
 * This file is part of the WebIn Platform.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         PT. Lingkar Kreasi (Circle Creative)
 *  @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */
// ------------------------------------------------------------------------

namespace App\Panel\Controllers;

// ------------------------------------------------------------------------

use App\Panel\Http\AccessControl\Controllers\AuthorizedController;
use O2System\Kernel\DataStructures\Input\Data;

/**
 * Class Tags
 * @package App\Panel\Controllers\Store
 */
class Tags extends AuthorizedController
{
    /**
     * Tags::index
     * @var \App\Models\Tags|string
     */
    public $model = 'App\Models\Tags';

    // ------------------------------------------------------------------------
    /**
     * Tags::index
     */
    public function index()
    {
        if ($keyword = input()->get('keyword')) {
            $this->model->qb->like('title', $keyword);
        }

        $tags = $this->model->all();

        view('tags/index', ['tags' => $tags]);
    }

    // ------------------------------------------------------------------------
    /**
     * Tags::form
     *
     * @param null $id
     * @throws \O2System\Spl\Exceptions\Logic\BadFunctionCall\BadDependencyCallException
     */
    public function form($id = null)
    {
        $tag = $this->model->find($id);

        if ($post = input()->post()) {
            if ($id == null) {
                $this->model->insert($post);
                redirect_url('tags/index');
            } else {
                $this->model->update($post);
                redirect_url('tags/index');
            }
        }

        view('tags/form', ['tag' => $tag]);
    }

    // ------------------------------------------------------------------------
    /**
     * Tags::detail
     *
     * @param $id
     */
    public function detail($id)
    {
        $tag = $this->model->find($id);

        view('tags/view', ['tag' => $tag]);
    }

    // ------------------------------------------------------------------------
    /**
     * Tags::delete
     *
     * @param $id
     * @throws \O2System\Spl\Exceptions\Logic\BadFunctionCall\BadDependencyCallException
     */
    public function delete($id)
    {
        if ($tag = $this->model->find($id)) {
            $this->model->update(
                new Data([
                    'id' => $id,
                    'record_status' => 'DELETED'
                ]),
                [
                    'id' => $id
                ]
            );
        }

        redirect_url('tags/index');
    }
}
