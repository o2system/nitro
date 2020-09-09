<?php

/**
 * This file is part of the Circle Creative Web Application Project Boilerplate.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         PT. Lingkar Kreasi (Circle Creative)
 *  @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */
// ------------------------------------------------------------------------

namespace App\Panel\Controllers\Appearance;

// ------------------------------------------------------------------------

use App\Panel\Http\AccessControl\Controllers\AuthorizedController;
use O2System\Framework\Models\Sql\System\Modules;
use O2System\Html\Element;
use O2System\Kernel\DataStructures\Input\Data;
use O2System\Spl\DataStructures\SplArrayObject;

/**
 * Class Customize
 * @package App\Panel\Controllers
 */
class Customize extends AuthorizedController
{
    /**
     * Customize::__reconstruct
     */
    public function __reconstruct()
    {
        parent::__reconstruct(); // TODO: Change the autogenerated stub
    }

    // ------------------------------------------------------------------------

    /**
     * Customize::index
     */
    public function index()
    {
        //require PATH_APP . 'Site/Config/Navigations.php';
        //print_out(json_encode($navigations));

        presenter()->theme->setLayout('customizer');

        $module = models(Modules::class)->find('App\\Site', 'namespace');

        $customizers = [
            'site_identity',
            'menus'
        ];

        $iframe = new Element('iframe');
        $iframe->attributes->addAttribute('src', domain_url());
        $iframe->attributes->addAttribute('width', '100%');
        $iframe->attributes->addAttribute('height', '100%');

        presenter()->offsetSet('settings', $module->settings);

        //print_out($module->settings);

        presenter()->offsetSet('forms', new SplArrayObject([
            'site_identity' => view('customize/site_identity', [], true),
            'menus' => view('customize/menus', [], true)
        ]));

        // Load Modules
        $modules = models(Modules::class)->findWhere(['id_parent' => globals()->app->id]);
        if ($modules->count()) {
            foreach ($modules as $module) {
                $modulePath = PATH_ROOT . trim(str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $module->path), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

                if (is_dir($modulePath)) {
                    if(is_dir($customizePath =$modulePath . 'Views' . DIRECTORY_SEPARATOR . 'customize' . DIRECTORY_SEPARATOR)) {
                        $customizeFiles = scandir($customizePath);
                        $customizeFiles = array_slice($customizeFiles, 2);

                        foreach($customizeFiles as $customizeFile) {
                            presenter()->forms->offsetSet(pathinfo($customizeFile, PATHINFO_FILENAME), view($customizePath . $customizeFile, [], true));
                        }
                    }
                }
            }
        }

        presenter()->offsetSet('menus', $module->settings->menus);
        presenter()->offsetSet( 'index', count($module->settings->menus));
        presenter()->partials->offsetSet('content', $iframe->__toString());

        if ($post = input()->post()) {

            // $post['menus'] = [
            //     [
            //         'name' => 'Primary Menu',
            //         'show_on_primary' => 'YES',
            //         'show_on_bottom' => 'NO',
            //         'add_new_top_level' => 'YES',
            //         'menu' => [
            //             [
            //                 'label' => 'Home',
            //                 'url' => 'https://sample.com/home'
            //             ],
            //             [
            //                 'label' => 'Contact',
            //                 'url' => 'https://sample.com/contact'
            //             ],
            //         ]
            //     ],
            //     [
            //         'name' => 'Secondary Menu',
            //         'show_on_primary' => 'YES',
            //         'show_on_bottom' => 'NO',
            //         'add_new_top_level' => 'YES',
            //         'menu' => [
            //             [
            //                 'label' => 'Test',
            //                 'url' => 'https://sample.com/test'
            //             ],
            //             [
            //                 'label' => 'Test 2',
            //                 'url' => 'https://sample.com/test2'
            //             ],
            //         ]
            //     ]
            // ];

            $totalIndex = count($_POST['menus']);
            $final = null;

            $i = 0;
            foreach ($post['menus'] as $menus) {
                if (!empty($menus['name'])) {
                    $final[$i] = $menus;
                }

                $i++;
            }

            if (models(Modules::class)->update(new Data([
                'settings' => [
                    'site_name'     => $post['site_name'],
                    'tag_line'      => $post['tag_line'],
                    'check_site'    => $post['check_site'],
                    'site_icon'     => $post['site_icon'],
                    'scheme'        => $post['scheme'],
                    'fonts_heading' => $post['fonts_heading'],
                    'fonts_body'    => $post['fonts_body'],
                    'shop_setting'  => $post['shop_setting'],
                    'menus'  => $final,
                ]
            ]), [
                'namespace' => 'App\\Site'
            ])) {
                redirect_url(input()->server('HTTP_REFERER'));
            }
        }
    }
}