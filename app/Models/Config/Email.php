<?php
/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

/**
 * Email Configuration
 *
 * @var \O2System\Email\DataStructures\Config
 */
$email = new \O2System\Email\DataStructures\Config([
    /**
     * Sender debugger
     *
     * @var string
     */
    'debug' => false,

    /**
     * Sender Protocol
     * Supported sender protocol mail, smtp or sendmail.
     *
     * @var string
     */
    'protocol' => 'smtp',

    /**
     * Sender User Agent
     *
     * @var string
     */
    'userAgent' => 'O2System\Email',

    /**
     * Wordwrap email body.
     *
     * @var bool
     */
    'wordwrap' => false,

    // ------------------------------------------------------------------------

    /**
     * SendMail Protocol Configuration
     * Set sendmail binary path.
     *
     * @var string
     */
    'mailPath' => '/usr/sbin/sendmail',

    /**
     * SMTP Protocol Configuration
     * Fill all configuration below if you set protocol to smtp.
     */

    // ------------------------------------------------------------------------

    /**
     * SMTP Host
     * Can be an IP Address or domain name.
     *
     * @var string
     */
    'host' => 'smtp.mailtrap.io',

    /**
     * SMTP Port
     * By default it's set to 25.
     *
     * @var numeric
     */
    'port' => 2525,

    /**
     * SMTP Auth
     * Supported authentication type: true, false, PLAIN, LOGIN, CRAM-MD5
     *
     * @var bool|string
     */
    'auth' => 'LOGIN',

    /**
     * SMTP Username
     *
     * @var string
     */
    'username' => 'e002a0a50d7832',

    /**
     * SMTP Password
     *
     * @var string
     */
    'password' => 'b74e16caaa1ca3',
    
    /**
     * SMTP Encryption Type
     * Supported encryption type none, tls or ssl.
     *
     * @var string
     */
    'encryption' => 'tls'
]);
