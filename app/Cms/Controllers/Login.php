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

use App\Cms\Http\Controller;
use O2System\Cache\Item;
use O2System\Framework\Libraries\Acl\DataStructures\Account;
use O2System\Framework\Libraries\Email;
use O2System\Kernel\Http\Message\Uri;
use O2System\Security\Generators\Token;

/**
 * Class Login
 *
 * @package App\Cms\Controllers
 */
class Login extends Controller
{
    public function __reconstruct()
    {
        parent::__reconstruct();
        presenter()->theme->setLayout( 'login' );
    }

    /**
     * Login::index
     */
    public function index()
    {
        // if( $this->user->loggedIn() ) {
        //     redirect_url( 'stats' );
        // }

        presenter()->page->setHeader( 'Login' );
        view( 'login' );
    }

    // --------------------------------------------------------------------------------------

    /**
     * Login::authenticate
     */
    public function authenticate()
    {
        $login = $this->user->authenticate( $this->input->post( 'username' ), $this->input->post( 'password' ), $this->input->post( 'remember' ) );

        if ( $login ) {
            // Login True
            redirect_url('stats');
        } else {

            $this->session->setFlash('danger', $this->language->getLine('ALERT_DANGER_LOGIN_FAILED'));
            redirect_url( 'login' );

        }
    }

    public function forgotPassword()
    {
        $this->presenter->theme->setLayout( 'login' );
        $this->presenter->page->setHeader( 'Forgot Password' );

        $userNameOrEmail = $this->input->post('username');

        if ($userNameOrEmail !== NULL) {
            $checkUserOrEmail = $this->models->users->findwhere([
                'email' => $userNameOrEmail
            ]);
            if($checkUserOrEmail == false){
                $checkUserOrEmail = $this->models->users->findwhere([
                    'username' => $userNameOrEmail
                ]);
            }
            if($checkUserOrEmail == false){
                session()->setFlash('error', $this->language->getLine('NOT_EXIST_EMAIL_OR_USERNAME'));
            }else{
                $token     = new Token();
                $getToken  = $token->generate(8);
                $arrayToken = [ 'pin' => $getToken];
                session()->setFlash('success', $this->language->getLine('ALERT_CHECK_YOUR_EMAIL'));
                $accountInfo = $checkUserOrEmail->first();
                $this->models->users->update($arrayToken,['id' => $accountInfo->id]);

                $email = new Email();
                $email->subject( 'Reset Password' );
                $email->from('no-reply@selarasholding.com', 'Selaras Holding');
                $email->to($accountInfo->email);
                $email->template('email/reset-password', [
                    'username' => $accountInfo->username,
                    'token'    => $getToken
                ]);
                if($email->send()){

                }else{

                }
            }
        }
        view( 'forgot-password' );
    }

    public function validate($token = null)
    {
        $this->presenter->theme->setLayout('login');
        $this->presenter->page->setHeader('Reset Password');
        $account = $this->models->users->findWhere(['pin' => $token]);
        if($post = $this->input->post()){
            $password = $post->password;
            $repasword = $post->repassword;
            if($password == $repasword){
                session()->setFlash('success', language('SUCCESS_CHANGE_YOUR_PASSWORD'));
                $this->models->users->update(['password' => $this->user->passwordHash($password)],['id' => $post->id]);
                redirect_url('login');
            }else{
                session()->setFlash('failed', language('Correct Your Password'));
            }
        }
        if ($account != null) {
            view('reset-account', [
                'username' => $account->first()->username,
                'iduser' => $account->first()->id
            ]);
        } else {
            redirect_url('forgot-password');
        }
    }
}