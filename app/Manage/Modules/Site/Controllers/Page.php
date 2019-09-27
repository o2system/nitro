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
use O2System\Spl\Datastructures\SplArrayObject;
use App\Api\Modules\Media\Models\Media;

/**
 * Class Pages
 * @package App\Manage\Modules\Sites\Controllers
 */
class Page extends Controller
{
    public $model = '\App\Api\Modules\Pages\Models\Pages';
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


    public function form($id=null)
    {
        $this->presenter->page->setHeader( 'FORM_ADD' );
        $vars = [
            'post' => new SplArrayObject(),
            'visibility' => visibilityOptions(),
            'status' => posts_status(),
            'world_languages' => world_languages()
        ];

        $this->model->appendColumns = [
            'metadata', 'record', 'image'
        ];

        if ($id) {
            $this->model->qb->where('record_status !=', 'DELETED');
            if (false !== ($data = $this->model->find($id))) {
                $this->presenter->page->setHeader( 'FORM_EDIT' );
                $vars['post'] = $data;
                // print_out($vars);
            } else {
                $this->output->send(204);
            }
        }

        view('pages/form', $vars);
    }
}