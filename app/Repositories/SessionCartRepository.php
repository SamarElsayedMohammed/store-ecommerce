<?php
namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\CartInterface;

/**
 * Summary of CookieCartRepository
 */
class CookieCartRepository implements CartInterface
{

    public function get(){

    }
    public function add(Product $product, $quantity = 1){

    }

    public function update($id, $quantity){
        
    }

    public function delete($id){
        
    }

    public function empty(){
        
    }

    public function total(): float{

        $count = 0;
        return $count;
        
    }

}