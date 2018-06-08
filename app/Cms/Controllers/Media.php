<?php
/**
 * This file is part of the O2System Content Management System package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian
 * @copyright      Copyright (c) Steeve Andrian
 */
// ------------------------------------------------------------------------

namespace App\Controllers;

// ------------------------------------------------------------------------

use Cms\Http\AccessControl\Controllers\AuthorizedController;
use O2System\Framework\Libraries\Ui\Contents\Link;
use O2System\Filesystem\Handlers\Uploader;

/**
 * Class Media
 * @package App\Controllers
 */
class Media extends AuthorizedController
{
    private $mediaModel;

    public function __construct()
    {
        $this->mediaModel = new \Cms\Models\Media();
    }

    public function index()
    {
        presenter()->page
            ->setHeader( 'Media' )
            ->setDescription( 'The O2CMS Media' );

        presenter()->page->icon->setClass( 'fas fa-image' );

        presenter()->page->breadcrumb->createList( new Link(
            language()->getLine( 'MEDIA' ),
            base_url( 'media' )
        ) );

        $media = $this->mediaModel->getuploadedImages();

        view( 'media', ['medias' => $media] );
    }

    public function form()
    {
        presenter()->theme->setLayout( 'add' );
        presenter()->page->setHeader( 'Add Media' );
        view( 'add-media' );
    }

    public function upload()
    {
        $upload = new Uploader();
        $upload->process('file-image');

        if ($upload->getErrors()) {
            $errors = new Unordered();

            foreach ($upload->getErrors() as $code => $error) {
                $errors->createList($error);
            }

            session()->setFlash('error', 'Failed to upload image' . $errors);
        } else {
            $post->image = $upload->getUploadedFiles()->first();
        }
    }

    public function modal()
    {
        unset($_SERVER[ 'HTTP_X_REQUESTED_WITH' ]);
        presenter()->theme->setLayout('modal');
        view('media', []);
    }
}
