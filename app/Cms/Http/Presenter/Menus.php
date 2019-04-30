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

use App\Cms\Http\Presenter\Menus\Group;
use O2System\Spl\Patterns\Structural\Repository\AbstractRepository;

/**
 * Class Menus
 *
 * @package App\Cms\DataStructures
 */
class Menus extends AbstractRepository
{
    public function __construct()
    {
        /*if(services('user')->loggedIn()) {
            switch (session()->account->role->code) {
                case 'DEVELOPER':
                case 'ADMINISTRATOR':
                    $this->buildAdministrator();
                    break;
            }
        }*/
    }

    protected function buildAdministrator()
    {
        // Dashboard
        $otobusMenu = [
            'Master' => [
                'label' => 'Terminal',
                'icon' => 'fas fa-tachometer-alt',
                'href' => base_url('stats')
            ],
            'departures' => [
                'label' => 'DEPARTURES',
                'icon' => 'fa fa-calendar',
                'href' => base_url('departures')
            ],
            'tickets' => [
                'label' => 'TICKETS',
                'icon' => 'fas fa-ticket-alt',
                'href' => base_url('tickets')
            ],
            'routes' => [
                'label' => 'ROUTES',
                'icon' => 'fa fa-road',
                'href' => base_url('routes')
            ],
            'fleets' => [
                'label' => 'FLEETS',
                'icon' => 'fa fa-bus',
                'href' => base_url('fleets')
            ],
            'crews' => [
                'label' => 'CREWS',
                'icon' => 'fa fa-users',
                'href' => base_url('crews')
            ],
            'agents' => [
                'label' => 'AGENTS',
                'icon' => 'fas fa-user-circle',
                'href' => base_url('agents')
            ]
        ];

        $ticketingMenuSegments = array_keys($otobusMenu);

        foreach($ticketingMenuSegments as $ticketingMenuSegment) {
            if(session()->account->role->authorities->authorize($ticketingMenuSegment) === false) {
                if(session()->account->role->code === 'STAFF') {
                    unset($otobusMenu[$ticketingMenuSegment]);
                }
            }
        }

        if(count($otobusMenu)) {
            $this->store('ticketing', (new Group('TICKETING'))->setItems($otobusMenu));
        }

        $siteMenu = [
            'site/pages' => [
                'label' => 'PAGES',
                'icon' => 'fas fa-file-code',
                'href' => base_url('pages'),
                'add' => base_url('pages/add'),
            ],
            'site/posts' => [
                'label' => 'POSTS',
                'icon' => 'fas fa-file-alt',
                'href' => base_url('posts'),
                'add' => base_url('posts/add'),
            ],
            'site/media' => [
                'label' => 'MEDIA',
                'icon' => 'fas fa-file-image',
                'href' => base_url('media')
            ]
        ];

        $siteMenuSegments = array_keys($siteMenu);

        foreach($siteMenuSegments as $siteMenuSegment) {
            if(session()->account->role->authorities->authorize($siteMenuSegment) === false) {
                if(session()->account->role->code === 'STAFF') {
                    unset($siteMenu[$siteMenuSegment]);
                }
            }
        }

        if(count($siteMenu)) {
            $this->store('site', (new Group('SITE'))->setItems($siteMenu));
        }
    }
}
