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

namespace App\Models;

// ------------------------------------------------------------------------

use O2System\Framework\Models\Sql\Model;
use O2System\Spl\DataStructures\SplArrayStorage;

/**
 * Class Carts
 * @package App\Models
 */
class Carts extends Model
{
    /**
     * Carts::$table
     *
     * @var string
     */
    public $table = 'store_carts';

    /**
     * Carts::add
     *
     * Custom setter.
     *
     * @param SplArrayStorage $data
     * @return bool
     */
    public function add(SplArrayStorage $data)
    {
        // Cek dulu, id nya sudah ada sebelumnya? kalau sudah update quantity aja, jangan nambah baru.
        $cart = $this->findWhere([
            'id_people' => session()->account->profile->id,
            'id_store_product_variant' => $data->id_store_product_variant
        ]);

        if ($cart->count()) {
            $quantity = $cart[0]->quantity + 1;
            $priceSubtotal = $cart[0]->price_value * $quantity;
            
            $this->update(new SplArrayStorage([
                'quantity' => $quantity,
                'price_subtotal' => $priceSubtotal
            ]), [
                'id_people' => session()->account->profile->id,
                'id_store_product_variant' => $data->id_store_product_variant
            ]);
            
            return true;
        }

        return $this->insert($data);
    }

    /**
     * Carts::updateQuantity
     *
     * Update per item.
     *
     * @return bool
     */
    public function updateQuantity($id, $quantity)
    {
        // Get old ..
        $item = $this->find($id);
        
        // Count new subtotal
        $price_subtotal = $item->price_value * $quantity;

        // Update
        $this->update(new SplArrayStorage([
            'price_subtotal' => $price_subtotal,
            'quantity' => $quantity
        ]), ['id' => $id]);

        return true;
    }

    /**
     * Carts::amount
     */
    public function amount($idPeople)
    {
        $result = null;
        
        $items = $this->findWhere([
            'id_people' => $idPeople,
        ]);

        foreach ($items as $item) {
            $result = $result + $item->price_subtotal;
        };
        
        return $result;
    }
}
