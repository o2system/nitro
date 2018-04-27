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

namespace Site\Controllers;

// ------------------------------------------------------------------------

use Site\Http\Controller;

/**
 * Class Pages
 * @package Site\Controllers
 */
class Pages extends Controller
{
    public function setPage($page)
    {
        services()->statistics->log();

        presenter()->page->setHeader($page->title);
        presenter()->page->store('content', $page->content);

        if ( ! empty($page->image)) {
            presenter()->page->store('image', images_url($page->image));
        }
    }

    // ------------------------------------------------------------------------

    public function index()
    {
        view('pages');
    }
}