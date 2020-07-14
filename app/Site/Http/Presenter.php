<?php


namespace App\Site\Http;


use O2System\Framework\Models\Sql\System\Settings;

class Presenter extends \O2System\Framework\Http\Presenter
{
    public function __construct()
    {
        parent::__construct();
        $meta = models(Settings::class)->fetch();
        if (count($meta)) {
            $this->meta->title->prepend($meta->site_title ? $meta->site_title : 'Nitro by O2System');
            $this->meta->offsetSet('robot', $meta->meta_robot);
            $this->meta->offsetSet('description', $meta->meta_description);
            $this->meta->offsetSet('keyword', $meta->meta_keyword);
        } else {
            $this->meta->title->prepend('Nitro by O2System');
        }
    }

}