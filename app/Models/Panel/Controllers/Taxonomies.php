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
 * Class Taxonomies
 * @package App\Panel\Controllers\Taxonomies
 */
class Taxonomies extends AuthorizedController
{
    /**
     * Taxonomies::index
     * @var string|
     */
    public $model = 'O2System\Framework\Models\Sql\System\Taxonomies';

    public function index()
    {
        if ($keyword = input()->get('keyword')) {
            $this->model->qb->like('name', $keyword);
        }

        $taxonomies = $this->model->all();

        view('taxonomies/index', ['taxonomies' => $taxonomies]);
    }

    public function form($id = null)
    {
        $taxonomies = $this->model->find($id);

        $parents = $this->model->all();

        if ($post = input()->post()) {
            if ($post['id'] == null) {
                if ($this->model->insert($post)) {
                    session()->setFlash('success', 'Successfully added');
                } else {
                    session()->setFlash('danger', 'Failed to insert');
                    redirect_url($_SERVER['HTTP_REFERER']);
                }
            } else {
                if ($this->model->update($post)) {
                    session()->setFlash('success', 'Successfully updated');
                } else {
                    session()->setFlash('danger', 'Failed to update');
                    redirect_url($_SERVER['HTTP_REFERER']);
                }
            }

            redirect_url('taxonomies/index');
        }

        view('taxonomies/form', [
            'taxonomies' => $taxonomies,
            'parents'    => $parents
        ]);
    }

    public function detail($id)
    {
        $taxonomies = $this->model->find($id);

        view('taxonomies/view', ['taxonomies' => $taxonomies]);
    }

    public function delete($id)
    {
        if ($taxonomies = $this->model->find($id)) {
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

        redirect_url('taxonomies/index');
    }
}
