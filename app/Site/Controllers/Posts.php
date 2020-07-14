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

namespace App\Site\Controllers;

// ------------------------------------------------------------------------

use App\Site\Http\Controller;

/**
 * Class Posts
 * @package App\Site\Controllers
 */
class Posts extends Controller
{
    /**
     * Posts::index
     */
    public function index()
    {
        models(\App\Models\Posts::class)->visibleRecordStatus = [ input()->get('status', 'PUBLISH') ];

        models(\App\Models\Posts::class)->appendColumns[] = 'author';
        models(\App\Models\Posts::class)->appendColumns[] = 'comments';

        models(\App\Models\Posts::class)->qb
            ->where([
                'record_language' => config()->language['default'],
            ])
            ->whereIn('record_type', ['ARTICLE', 'VIDEO', 'AUDIO', 'GALLERY']);

        //print_out(models(\App\Models\Posts::class)->paginate(10));

        view('posts', [
            'posts' => models(\App\Models\Posts::class)->paginate(10)
        ]);
    }
}