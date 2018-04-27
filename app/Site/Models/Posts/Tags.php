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

namespace Site\Models\Posts;

// ------------------------------------------------------------------------

use Site\Models\Posts;

/**
 * Class Tags
 * @package Site\Models\Posts
 */
class Tags extends Posts
{
    public $table = 'site_sections_posts_tags';

    public function __construct()
    {
        parent::__construct();

        $this->qb->join('site_sections_tags', 'site_sections_tags.id = site_sections_posts_tags.id_section_tag');
    }
}