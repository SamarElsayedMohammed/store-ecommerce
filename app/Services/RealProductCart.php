<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class RealProductCart
{

    public function RealProductsDetails($cart)
    {
// dd($cart);
        $new = $cart->map(function ($item) {
            $product = Product::with('file', 'categories')->where('id', $item['item_id'])->first();
            if ($product->file) {
                $file = asset("storage/uploads/images/brands/default.jpg");
            } else {
                $file = asset($product->file[0]->file_name);
            }
            return array(
                'item_id' => $product->id,
                'item_name' => $product->name,
                'item_price' => $item['item_price'],
                'item_file' => $file,
                'item_category' => 'no category',
                'item_quantity' => $item['item_quantity'],
                'item_total_price' => $item['item_quantity'] * $item['item_price'],

            );
        });
        return $new->all();


    }

    public function getCart($cart)
    {
        if (!is_array($cart)) {
            $cookie_data = stripslashes($cart);
              $cart_data = json_decode($cookie_data, true);
            return $cart_data;
        } else {
            return array();
        }


    }
}