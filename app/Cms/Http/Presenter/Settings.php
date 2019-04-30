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

namespace App\Cms\Http\Presenter;

// ------------------------------------------------------------------------

use O2System\Kernel\Http\Message\Uri;
use O2System\Spl\Patterns\Structural\Repository\AbstractRepository;

/**
 * Class Settings
 * @package App\Cms\Http\Presenter
 */
class Settings extends AbstractRepository
{
    public function __construct()
    {
        $model = new \App\Cms\Models\Settings();

        $result = $model->all();

        $uri = new Uri();
        $this->store('address', $uri->getScheme() . '://' . $uri->getHost());

        foreach ($result as $row) {
            $this->store($row->key, $row->value);
        }
    }
}