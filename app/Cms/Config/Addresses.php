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

use O2System\Kernel\Http\Router\Addresses;

$addresses = new Addresses();

// ------------------------------------------------------------------------

// CMS Default Controller
$addresses->any(
    '/',
    function () {
        return new \Cms\Controllers\Login();
    }
);

// CMS Logout Request
$addresses->any(
    '/logout',
    function () {
        services( 'user' )->logout();
        redirect_url('login');
    }
);

// CMS Forgot-Password Request
$addresses->any(
    '/forgot-password',
    function () {
        return [ 'login', 'forgot-password' ];
    }
);

// ------------------------------------------------------------------------