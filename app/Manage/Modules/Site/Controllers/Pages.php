<?php
/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

namespace App\Manage\Modules\Site\Controllers;

// ------------------------------------------------------------------------

use App\Manage\Modules\Site\Http\Controller;
use O2System\Framework\Models\Options;
use O2System\Spl\Datastructures\SplArrayObject;

/**
 * Class Pages
 * @package App\Manage\Modules\Sites\Controllers
 */
class Pages extends Controller
{
    /**
     * Pages::$model
     *
     * @var string
     */
    public $model = '\App\Api\Modules\Site\Models\Pages';

    // ------------------------------------------------------------------------

    /**
     * Pages::index
     */
	public function index()
    {
        $get = new SplArrayObject([
            'status'    => input()->get('status') ?  input()->get('status') : 'PUBLISH',
            'title'    => input()->get('title') ?  input()->get('title') : '',
        ]);

        if($status = $get->status){
            $this->model->qb->where('record_status', $status);
        }

        if($title = $get->title){
            $this->model->qb->where('title', $title);
        }

        view('pages/index', [
            'pages' =>  $this->model->allWithPaging(),
            'get'   => $get
        ]);
    }

    // ------------------------------------------------------------------------

    /**
     * Pages::form
     *
     * @param int|null $id
     */
    public function form($id = null)
    {
        presenter()->theme->setLayout( 'blank' );
        presenter()->page->setHeader( 'PAGES_ADD' );

        $vars = [
            'post' => new SplArrayObject(),
            'options' => new SplArrayObject([
                'visibility' => models(Options::class)->visibilities(),
                'status' => models(Options::class)->status(),
                'languages' => models(Options::class)->languages()
            ])
        ];

        $this->model->appendColumns = [
            'metadata', 'record', 'image'
        ];

        if (isset($id)) {
            if ($result = $this->model->findWhere([
                    'id' => intval($id),
                    'record_status !=' => 'DELETED'
                ])) {
                if($result->count()) {
                    presenter()->page->setHeader( 'PAGES_EDIT' );

                    $vars['post'] = $result->first();
                } else {
                    output()->sendError(404);
                }

            } else {
                output()->sendError(204);
            }
        }

        view('pages/form', $vars);
    }
}