<?php
/**
 * This file is part of the WhereIndonesia Application.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         PT. Lingkar Kreasi (Circle Creative)
 *  @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */
// ------------------------------------------------------------------------

use O2System\Kernel\Http\Router\Addresses;
use App\Manage\Controllers;

$addresses = new Addresses();

// ------------------------------------------------------------------------

// CMS Default Controller
$addresses->any(
    '/',
    function () {
        return new Controllers\Login();
    }
);

$addresses->any(
    '/login',
    function () {
        return new Controllers\Login();
    }
);

$addresses->any(
    '/logout',
    function () {
        return (new Controllers\Login())->logout();
    }
);

// ------------------------------------------------------------------------