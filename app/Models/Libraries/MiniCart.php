<?php

/**
 * Mini Cart
 *
 * Minimalist (< 100 lines of code) shopping cart with native PHP Session API for CodeIgniter.
 * Why using overkill library? use this bro.
 *
 * @author Oriza
 * @package Payment
 */

namespace App\Libraries;

class MiniCart
{
    public function __construct()
    {
    }

    /**
     * Increase & add item to cart.
     */
    public function add(array $param)
    {
        // Init.
        $totalQty = 0;
        $totalPrice = 0;
        $totalWeight = 0;
        $hash = $this->hash($param['id']);
        
        // Just add ..
        if (!isset($_SESSION['minicart']['items'])) {
            $_SESSION['minicart']['total_weight'] = 0;
            $_SESSION['minicart']['total_qty'] = 0;
            $_SESSION['minicart']['total_price'] = 0;
            $_SESSION['minicart']['items'][$hash] = $param;
        } else {
            // Is there a same index before? detect from id.
            if (isset($_SESSION['minicart']['items'][$hash])) {
                // Just increase it's qty
                $qty = (int)$_SESSION['minicart']['items'][$hash]['qty'];
                $_SESSION['minicart']['items'][$hash]['qty'] = $qty + 1;
            } else {
                // Handle new item, append.
                $_SESSION['minicart']['items'][$hash] = $param;
            }
        }
        
        // Jika sudah ada item, update statistic.
        if (count($_SESSION['minicart']['items']) >= 0) {
            foreach ($_SESSION['minicart']['items'] as $key => $item) {
                $totalQty += $item['qty'];
                $totalWeight += ($item['weight'] * $item['qty']);
                $totalPrice += ($item['price'] * $item['qty']);
            }
            
            $_SESSION['minicart']['total_weight'] = $totalWeight;
            $_SESSION['minicart']['total_qty'] = $totalQty;
            $_SESSION['minicart']['total_price'] = $totalPrice;
        }

        return true;
    }

    /**
     * Get single item ..
     */
    public function get($index)
    {
        if (!isset($_SESSION['minicart'])) {
            return null;
        }
        
        return $_SESSION['minicart'][$index];
    }

    /**
     * Get all cart contents.
     */
    public function gets()
    {
        if (isset($_SESSION['minicart']) && !empty($_SESSION['minicart'])) {
            return $_SESSION['minicart'];
        }

        return null;
    }

    /**
     * Decrease item inside cart ..
     *
     * @return bool
     */
    public function decrease($id)
    {
        // Init.
        $totalQty = 0;
        $totalPrice = 0;
        $totalWeight = 0;
        $hash = $this->hash($id);

        // Is there a same index before? detect from id.
        if (!isset($_SESSION['minicart']['items'][$hash])) {
            return true;
        }

        // Decrease it's qty
        $qty = (int)$_SESSION['minicart']['items'][$hash]['qty'];
        
        if ($qty > 1) {
            $_SESSION['minicart']['items'][$hash]['qty'] = $qty - 1;
        } else {
            return false;
        }
        
        // Update statistic.
        if (count($_SESSION['minicart']['items']) >= 0) {
            foreach ($_SESSION['minicart']['items'] as $key => $item) {
                $totalQty += $item['qty'];
                $totalWeight += ($item['weight'] * $item['qty']);
                $totalPrice += ($item['price'] * $item['qty']);
            }
            
            $_SESSION['minicart']['total_weight'] = $totalWeight;
            $_SESSION['minicart']['total_qty'] = $totalQty;
            $_SESSION['minicart']['total_price'] = $totalPrice;
        }

        return true;
    }

    /**
     * Change value inside index.
     */
    public function change($index, $key, $value)
    {
        // Init.
        $totalQty = 0;
        $totalPrice = 0;
        $totalWeight = 0;
        
        // Is index exist.
        if (!isset($_SESSION['minicart']['items'][$index])) {
            return true;
        }

        // Change key value ..
        $_SESSION['minicart']['items'][$index][$key] = $value;
        
        // Update statistic.
        if (count($_SESSION['minicart']['items']) >= 0) {
            foreach ($_SESSION['minicart']['items'] as $key => $item) {
                $totalQty += $item['qty'];
                $totalWeight += ($item['weight'] * $item['qty']);
                $totalPrice += ($item['price'] * $item['qty']);
            }
            
            $_SESSION['minicart']['total_weight'] = $totalWeight;
            $_SESSION['minicart']['total_qty'] = $totalQty;
            $_SESSION['minicart']['total_price'] = $totalPrice;
        }

        return true;
    }

    /**
     * Remove item.
     */
    public function remove($index)
    {
        unset($_SESSION['minicart']['items'][$index]);
        
        return true;
    }

    /**
     * Clear cart ..
     */
    public function clear()
    {
        unset($_SESSION['minicart']);
        
        return true;
    }

    /**
     * For generate unique id in MiniCart.
     */
    public function hash($string)
    {
        return md5($string);
    }
}
