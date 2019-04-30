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

namespace App\Cms\Http\AccessControl\Middleware;

// ------------------------------------------------------------------------

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class UserAuthorization
 *
 * @package App\Cms\Http\AccessControl\Middleware
 */
class UserAuthorization implements RequestHandlerInterface
{
    /**
     * UserAuthorization::handle
     *
     * Handles a request and produces a response
     *
     * May call other collaborating code to generate the response.
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if( services( 'user' )->loggedIn() ) {
            if( ! services( 'user' )->authorize( $request ) ) {
                redirect_url( 'error/403' );
            }
        } else {
            redirect_url( 'login' );
        }
    }
}