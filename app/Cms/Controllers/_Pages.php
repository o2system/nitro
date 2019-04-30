<?php
/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 *  @copyright      Copyright (c) Steeve Andrian Salim
 */

// ------------------------------------------------------------------------

namespace App\Cms\Controllers;

// --------------------------------------------------------------------------------------

use O2System\Framework\Http\Router\DataStructures\Page;
use O2System\Framework\Libraries\Ui\Components\Pagination;
use O2System\Framework\Libraries\Ui\Contents\Link;

/**
 * Class Pages
 *
 * @package App\Cms\Controllers
 */
class Pages extends \O2System\Framework\Http\Controllers\Pages
{
    /**
     * Pages Page
     *
     * @var Page
     */
    protected $page;

    // ------------------------------------------------------------------------

    /**
     * Pages::setPage
     *
     * @param \O2System\Framework\Http\Router\DataStructures\Page $page
     *
     * @return void
     */
    public function setPage(Page $page)
    {
        $this->page = $page;

        if (false !== ($presets = $this->page->getPresets())) {
            if ($presets->offsetExists('theme')) {
                $this->presenter->setTheme($presets->theme);
            }

            if ($presets->offsetExists('layout')) {
                $this->presenter->theme->setLayout($presets->layout);
            }

            if ($presets->offsetExists('title')) {
                $this->presenter->meta->title->append($presets->title);
            }

            if ($presets->offsetExists('pageTitle')) {
                $this->presenter->meta->title->append($presets->pageTitle);
            }

            if ($presets->offsetExists('browserTitle')) {
                $this->presenter->meta->title->replace($presets->browserTitle);
            }
        }
    }

    // ------------------------------------------------------------------------

    /**
     * Pages::index
     *
     * @return void
     */
    public function index()
    {
        if ($this->page instanceof Page) {
            $this->view->page($this->page);
        } else {
            $this->presenter->page
                ->setHeader('Pages')
                ->setDescription('Manage Pages');

            $this->presenter->page->icon->setClass('fas fa-file-code');

            $this->presenter->page->breadcrumb->createList(new Link(
                $this->language->getLine('PAGES'),
                base_url('pages')
            ));

            if ($status = input()->get('status')) {
                $this->models->controller->qb->where('record_status', $status);
            } else {
                $this->models->controller->qb->whereIn('record_status', ['PUBLISH', 'UNPUBLISH']);
            }

            if($query = input()->get('q')) {
                $this->models->controller->qb
                    ->like('title', $query)
                    ->orLike('content', $query);
            }

            $vars = [];
            $entries = $this->input->get('entries');
            $entries = empty($entries) ? 10 : $entries;

            $pages = $this->models->controller->page(null, $this->input->get('page'), $entries);

            if ($pages) {
                $info = $pages->getInfo();

                $pagination = new Pagination($info->getTotal('rows'), $entries);
                $pagination->attributes->addAttributeClass('justify-content-center');

                $vars = [
                    'pages'      => $pages,
                    'pagination' => $pagination,
                ];
            }

            $this->view->load('pages/index', $vars);
        }
    }

    public function form()//$idPage = null)
    {
        // $idPage = empty($idPage) ? input()->get('copy') : $idPage;
        // $idPage = intval($idPage);

        $this->presenter->theme->setLayout('form-page');

        // $vars[ 'fields' ] = new Settings();

        // if ($page = $this->models->controller->find($idPage)) {
        //     if ($idPage = input()->get('copy')) {
        //         unset($page->id);
        //         $page->title = $page->title . ' (Copy)';
        //         $page->segments = $page->segments . '-copy';
        //     }

        //     $vars[ 'page' ] = $page;
        // } elseif ($post = input()->post()) {
        //     if ($image = input()->files('file-image')) {
        //         $upload = new Uploader();
        //         $upload->process('file-image');

        //         if ($upload->getErrors()) {
        //             $errors = new Unordered();

        //             foreach ($upload->getErrors() as $code => $error) {
        //                 $errors->createList($error);
        //             }

        //             session()->setFlash('error', 'Failed to upload image' . $errors);
        //         } else {
        //             $post->image = $upload->getUploadedFiles()->first();
        //         }
        //     }

        //     if (empty($post->id)) {
        //         $this->models->controller->insert($post->getArrayCopy());
        //         session()->setFlash('success', 'Successful insert new page: ' . $post->title);
        //     } else {
        //         $this->models->controller->update($post->getArrayCopy(), ['id' => $post->id]);
        //         session()->setFlash('success', 'Successful update page: ' . $post->title);
        //     }

        //     redirect_url('pages');
        // }

        // view('pages/form', $vars);

        view('pages/form');
    }

    public function publish($idPage)
    {
        $idPage = intval($idPage);

        if (false !== ($page = $this->models->controller->find($idPage))) {
            if ($this->models->controller->publish($idPage)) {
                session()->setFlash('success', 'Successful publish <strong>' . $page->title . '</strong> page.');
            } else {
                session()->setFlash('error', 'Failed to publish <strong>' . $page->title . '</strong> page.');
            }
        }

        redirect_url('pages');
    }

    public function trash($idPage)
    {
        $idPage = intval($idPage);

        if (false !== ($page = $this->models->controller->find($idPage))) {
            if ($this->models->controller->trash($idPage)) {
                session()->setFlash('success', 'Successful moved <strong>' . $page->title . '</strong> page to trash.');
            } else {
                session()->setFlash('error', 'Failed to move <strong>' . $page->title . '</strong> page to trash.');
            }
        }

        redirect_url('pages');
    }

    public function restore($idPage)
    {
        $idPage = intval($idPage);

        if (false !== ($page = $this->models->controller->find($idPage))) {
            if ($this->models->controller->restore($idPage)) {
                session()->setFlash('success', 'Successful restore <strong>' . $page->title . '</strong> page.');
            } else {
                session()->setFlash('error', 'Failed to restore <strong>' . $page->title . '</strong> page.');
            }
        }

        redirect_url('pages');
    }

    public function delete($idPage)
    {
        $idPage = intval($idPage);

        if (false !== ($page = $this->models->controller->find($idPage))) {
            if ($this->models->controller->delete($idPage)) {
                session()->setFlash('success', 'Successful delete <strong>' . $page->title . '</strong> page.');
            } else {
                session()->setFlash('error', 'Failed to delete <strong>' . $page->title . '</strong> page.');
            }
        }

        redirect_url('pages');
    }
}