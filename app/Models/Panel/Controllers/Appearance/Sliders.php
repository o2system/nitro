<?php

/**
 * This file is part of the Circle Creative Web Application Project Boilerplate.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         PT. Lingkar Kreasi (Circle Creative)
 *  @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */
// ------------------------------------------------------------------------

namespace App\Panel\Controllers\Appearance;

// ------------------------------------------------------------------------

use App\Models\Taxonomies;
use App\Panel\Controllers\Posts as Controller;
use O2System\Kernel\DataStructures\Input\Data;

/**
 * Class Sliders
 * @package App\Panel\Controllers
 */
class Sliders extends Controller
{
    /**
     * Model
     */
    public $model = 'App\Models\Posts';

    // ------------------------------------------------------------------------

    /**
     * Sliders::index
     */
    public function index()
    {
        $this->model->visibleRecordStatus = [input()->get('status', 'PUBLISH')];

        $this->model->qb
            ->where([
                'record_type' => 'SLIDERS',
                'record_language' => config()->language['default'],
            ]);

        if ($keyword = input()->get('keyword')) {
            $this->model->qb->like('title', $keyword);
        }

        $posts = $this->model->all();

        view('appearance/sliders/index', [
            'posts' => $posts
        ]);
    }

    // ------------------------------------------------------------------------

    /**
     * @param int|null $id
     */
    public function form($id = null)
    {
        $categories = models(Taxonomies::class)->findWhere(['id_parent' => 18]);

        if ($post = input()->post()) {

            $action = empty($post[ 'id' ]) ? 'INSERT' : 'UPDATE';

            switch ($action) {
                case 'INSERT':
                    if ($this->model->insert($post)) {
                        session()->setFlash('success', 'Successfully added.');
                    } else {
                        session()->setFlash('danger', 'Failed to insert');
                        redirect_url($_SERVER['HTTP_REFERER']);
                    }
                    
                    break;

                case 'UPDATE':
                    if ($this->model->update($post, [
                        'id' => $post->id,
                        'record_language' => 'en-US'
                    ])) {
                        session()->setFlash('success', 'Successfully updated.');
                    } else {
                        session()->setFlash('danger', 'Failed to update');
                        redirect_url($_SERVER['HTTP_REFERER']);
                    }

                    break;
            }

            redirect_url(base_url('panel/appearance/sliders'));
        }

        view('appearance/sliders/form', [
            'slider' => $this->model->find($id),
            'categories' => $categories
        ]);
    }

    // ------------------------------------------------------------------------

    public function delete($id)
    {
        if ($slider = $this->model->find($id)) {
            $this->model->update(
                new Data([
                    'id' => $id,
                    'record_status' => 'DELETED'
                ])
            );
        }

        redirect_url('panel/appearance/sliders');
    }
}
