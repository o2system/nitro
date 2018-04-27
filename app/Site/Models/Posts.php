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

namespace Site\Models;

// ------------------------------------------------------------------------

use O2System\Framework\Models\Sql\Model;
use O2System\Framework\Models\Sql\Traits\FinderTrait;
use O2System\Framework\Models\Sql\Traits\RelationTrait;
use O2System\Spl\Datastructures\SplArrayObject;

/**
 * Class Posts
 * @package Site\Models
 */
class Posts extends Model
{
    use FinderTrait;
    use RelationTrait;

    public $table = 'site_sections_posts';

    public function user()
    {
        return $this->belongsTo('\App\Models\System\Users','record_create_user');
    }

    public function section()
    {
        return $this->belongsTo('\Site\Models\Sections', 'id_section');
    }

    public function categories()
    {
        return $this->hasMany($this->categories, 'id_section_post');
    }

    public function tags()
    {
        return $this->hasMany($this->tags, 'id_section_post');
    }

    public function meta()
    {
        $result = $this->hasMany($this->meta, 'id_section_post');

        $meta = new SplArrayObject();

        if($result) {
            foreach($result as $row) {
                $meta->offsetSet($row->name, $row->content);
            }
        }

        return $meta;
    }

    public function settings()
    {
        $result = $this->hasMany($this->settings, 'id_section_post');

        $settings = new SplArrayObject();

        if($result) {
            foreach($result as $row) {
                $settings->offsetSet($row->key, $row->value);
            }
        }

        return $settings;
    }
}