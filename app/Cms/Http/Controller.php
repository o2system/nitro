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

namespace App\Cms\Http;

// ------------------------------------------------------------------------

use App\Cms\Http\Presenter\Menus;
use App\Cms\Http\Presenter\Page;
use O2System\Framework\Libraries\Ui\Contents\Link;
use O2System\Security\Authentication\User\Account;
use O2System\Security\Authentication\User\Role;

/**
 * Class Controller
 *
 * @package App\Cms\Http
 */
class Controller extends \O2System\Framework\Http\Controller
{
    /**
     * Controller::__construct
     */
    public function __reconstruct()
    {
        $this->presenter->store('app', $app = modules()->getApp('cms')->getProperties());
        $this->presenter->store('page', new Page());

        $className = get_class_name($this);

        $this->presenter->page
            ->setHeader($app->name)
            ->setDescription($app->description);

        $this->presenter->page->breadcrumb->createList(new Link(
            $this->language->getLine(strtoupper($className)),
            base_url(strtolower($className))
        ));

        // if($this->user->loggedIn()) {
        //     $user = $this->models->users->find($this->session->account['id']);
        //     $account = new Account($user->getArrayCopy());

        //     // Store Account Profile
        //     if($profile = $user->profile) {
        //         $account->store('profile', $profile);
        //     }

        //     // Store Account Role
        //     if($role = $user->role) {
        //         $account->store('role', new Role([
        //             'label' => $role->label,
        //             'description' => $role->description,
        //             'code' => $role->code,
        //             'authorities' => $role->authorities
        //         ]));
        //     }

        //     // Update Session Account
        //     $this->session->account = $account;

        //     // Store Account
        //     $this->presenter->store('account', $account);

        //     // Build Menu
        //     $this->presenter->store('menus', new Menus());
        // }
    }
}
