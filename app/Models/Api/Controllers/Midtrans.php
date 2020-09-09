<?php

namespace App\Api\Controllers;

use App\Api\Http\Controller;
use App\Panel\Modules\Store\Models\Transactions;
use O2System\Framework\Models\Sql\System\Logs;
use O2System\Security\Encoders\Json;
use O2System\Spl\DataStructures\SplArrayStorage;

class Midtrans extends Controller
{
    /**
     * Receive
     *
     * For receive Midtrans push notif.
     *
     * @throws \O2System\Spl\Exceptions\Logic\BadFunctionCall\BadDependencyCallException
     * @return void
     */
    public function receive()
    {
        $input = file_get_contents('php://input');

        $result = Json::decode($input);

        // Find real id from code.
        $transaction = models(Transactions::class)->findWhere([
            'code_transaction' => $result['order_id']
        ]);

        if ($transaction->count()) {

            // Insert to logs.
            models(Logs::class)->insert(new SplArrayStorage([
                'ownership_id' => $transaction[0]->id,
                'ownership_model' => Transactions::class,
                'status' => strtoupper($result['transaction_status']),
                'record_status' => 'PUBLISH'
            ]));

            $this->output->setContentType('application/json');
            $this->output->send(['message' => 'Received succesfully, thank you.']);
        }

        // Harusnya dengan http status gagal.
        $this->output->setContentType('application/json');
        $this->output->sendError(202, 'Failed, order id is not found in our DB.');
    }
}
