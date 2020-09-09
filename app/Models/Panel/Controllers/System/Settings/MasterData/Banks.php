<?php
/**
 * This file is part of the O2System Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */

// ------------------------------------------------------------------------

namespace App\Panel\Controllers\System\Settings\MasterData;

// ------------------------------------------------------------------------

use App\Panel\Controllers\System\Settings\MasterData;
use O2System\Kernel\DataStructures\Input\Data;

/**
 * Class Banks
 * @package App\Panel\Controllers\System\Settings\MasterData
 */
class Banks extends MasterData
{
    /**
     * Banks::index
     * @var string|\App\Models\Master\Banks::class
     */
    public $model = '\App\Models\Master\Banks';

    // ------------------------------------------------------------------------

    /**
     * Banks::index
     */
    public function index()
    {
        if ($keyword = input()->get('keyword')) {
            $this->model->qb->like('name', $keyword);
        }

        $banks = $this->model->all();

        view('system/settings/master-data/banks/index', [
            'banks' => $banks
        ]);
    }

    // ------------------------------------------------------------------------

    /**
     * Banks::form
     *
     * @param null $id
     * @throws \O2System\Spl\Exceptions\Logic\BadFunctionCall\BadDependencyCallException
     */
    public function form($id = null)
    {
        $bank = $this->model->find($id);

        if ($post = input()->post()) {
            if ($id == null) {
                $this->model->insert($post);
                redirect_url('system/settings/master-data/banks');
            } else {
                $this->model->update($post);
                redirect_url('system/settings/master-data/banks');
            }
        }

        view('system/settings/master-data/banks/form', ['bank' => $bank]);
    }

    // ------------------------------------------------------------------------

    /**
     * Banks::detail
     *
     * @param $id
     */
    public function detail($id)
    {
        $bank = $this->model->find($id);

        view('system/settings/master-data/banks/view', ['bank' => $bank]);
    }

    // ------------------------------------------------------------------------

    /**
     * Banks::delete
     *
     * @param $id
     * @throws \O2System\Spl\Exceptions\Logic\BadFunctionCall\BadDependencyCallException
     */
    public function delete($id)
    {
    	if ($bank = $this->model->find($id)) {
    		$this->model->update(new Data([
	    		'id' => $id,
	    		'record_status' => 'DELETED'
	    	]));
    	}

		redirect_url('system/settings/master-data/banks');

    }
}
