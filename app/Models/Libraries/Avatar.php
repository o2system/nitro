<?php


namespace App\Libraries;


class Avatar
{
    public function get($name) {
        return 'https://avatars.dicebear.com/v2/initials/' . preg_replace('/[^a-z0-9 _.-]+/i', '', $name) . '.svg';
    }

}
