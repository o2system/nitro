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

namespace App\Api\Controllers;

// ------------------------------------------------------------------------

use App\Api\Http\AccessControl\Controllers\PublicController;
use O2System\Security\Authentication\JsonWebToken;
use O2System\Security\Filters\Rules;
use O2System\Spl\Exceptions\Logic\DomainException;
use O2System\Spl\Exceptions\Logic\OutOfRangeException;

/**
 * Class User
 * @package App\Api\Controllers
 */
class User extends PublicController
{
    /**
     * User::authenticate
     *
     * @throws OutOfRangeException
     * @throws DomainException
     * @throws \Exception
     */
    public function authenticate()
    {
        if($post = input()->post()) {
            $rules = new Rules($post);
            $rules->sets(
                [
                    [
                        'field'    => 'username',
                        'label'    => 'Username',
                        'rules'    => 'required',
                        'messages' => 'Username cannot be empty!',
                    ],
                    [
                        'field'    => 'password',
                        'label'    => 'Password',
                        'rules'    => 'required',
                        'messages' => 'Password cannot be empty!',
                    ],
                ]
            );

            if($rules->validate()) {
                if(services()->has('user')) {
                    print_out(services('user')->passwordHash($post->password));
                    if(services('user')->authenticate($post->username, $post->password)) {
                        $jwt = new JsonWebToken();
                        $token = $jwt->encode(session()->get('account'));

                        if(services('user')->loggedIn()) {
                            $this->sendPayload($token);
                        } else {
                            $this->sendPayload([
                                'success' => false,
                                'message' => 'Login failed, please try again in a few minutes!'
                            ]);
                        }
                    }
                } else {
                    $this->sendError(503, 'Service user is not exists!');
                }
            } else {
                $this->sendError(400, 'Username and password cannot be empty!');
            }
        } else {
            $this->sendError(400);
        }
    }
}