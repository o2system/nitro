<?php
/**
 * nitro
 *
 * @author  Steeve Andrian Salim
 * @date    01/10/19
 */

namespace App\Api\Modules\System\Controllers\Modules;


use App\Api\Modules\System\Http\Controller;
use O2System\Security\Generators\Token;

class Tokens extends Controller
{
    public function index()
    {
        $token = Token::generate(32);
        print_out($token);
    }

    public function validate($code)
    {
        if($this->model->validate($code)) {
            $this->sendPayload([
                'valid' => true,
            ]);
        } else {
            $this->sendPayload([
                'valid' => false
            ]);
        }
    }
}