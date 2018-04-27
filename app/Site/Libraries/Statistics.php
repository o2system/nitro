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

namespace Site\Libraries;

// ------------------------------------------------------------------------

/**
 * Class Statistics
 * @package App\Libraries
 */
class Statistics
{
    /**
     * Statistics::__construct
     */
    public function __construct()
    {
        models()->load('\Site\Models\Statistics');
    }

    // ------------------------------------------------------------------------

    public function log()
    {
        $log = [
            'id_sys_user' => services()->user->loggedIn() ? services()->user->account()->id : 0,
            'ip_address' => input()->ipAddress(),
            'useragent' => input()->userAgent(),
            'segments' => request()->getUri()->getSegments()->getString(),
            'query_string' => request()->getUri()->getQuery(),
            'referer' => input()->server('HTTP_REFERER')
        ];

        return models()->statistics->insert($log);
    }

    // ------------------------------------------------------------------------

    public function getReport()
    {
        $logs = models()->statistics->all();

        foreach($logs as $log) {
            $log->duration = strtotime($log->end_time) - strtotime($log->start_time);
        }

        return $logs;
    }
}