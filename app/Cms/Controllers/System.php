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

namespace App\Cms\Controllers;

// --------------------------------------------------------------------------------------

use App\Cms\Http\AccessControl\Controllers\AuthorizedController;

/**
 * Class System
 *
 * @package App\Cms\Controllers
 */
class System extends AuthorizedController
{
    public function route($method, array $args = [])
    {
        $this->presenter->page
            ->setHeader('System')
            ->setDescription('System Information');

        switch ($method) {
            default:
            case 'index':
                $this->presenter->page->setContent(
                    $this->view->load('system/configurations', [
                        'configurations' => config(),
                    ], true)
                );

                break;

            case 'folderPermissions':

                $folderPermissions[ 'app' ] = is_really_writable(PATH_APP);
                $folderPermissions[ 'public' ] = is_really_writable(PATH_PUBLIC);
                $folderPermissions[ 'cache' ] = is_really_writable(PATH_CACHE);
                $folderPermissions[ 'storage' ] = is_really_writable(PATH_STORAGE);
                $folderPermissions[ 'vendor' ] = is_really_writable(PATH_VENDOR);

                $this->presenter->page->setContent(
                    $this->view->load('system/folder-permissions', [
                        'folderPermissions' => $folderPermissions,
                    ], true)
                );

                break;

            case 'phpSettings':

                $phpsettings = ini_get_all();

                // remove sensitive information
                unset(
                    $phpsettings[ 'extension_dir' ],
                    $phpsettings[ 'sendmail_path' ],
                    $phpsettings[ 'url_rewriter.tags' ],
                    $phpsettings[ 'mysqli.default_socket' ],
                    $phpsettings[ 'opcache.lockfile_path' ],
                    $phpsettings[ 'pdo_mysql.default_socket' ],
                    $phpsettings[ 'xdebug.trace_output_dir' ]
                );

                $this->presenter->page->setContent(
                    $this->view->load('system/php-settings', [
                        'phpSettings' => $phpsettings,
                    ], true)
                );

                break;

            case 'phpInfo':

                ob_start();
                phpinfo();
                $contents = ob_get_contents();
                ob_end_clean();

                // the name attribute "module_Zend Optimizer" of an anker-tag is not xhtml valide, so replace it with "module_Zend_Optimizer"
                $phpinfo = (str_replace("module_Zend Optimizer", "module_Zend_Optimizer",
                    preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $contents)));

                $phpinfo = str_replace('<table>', '<table class="table table-bordered table-striped">', $phpinfo);

                $this->presenter->page->setContent(
                    $this->view->load('system/php-info', [
                        'phpinfo' => $phpinfo,
                    ], true)
                );

                break;
        }

        $this->view->load('system/layout');
    }
}
