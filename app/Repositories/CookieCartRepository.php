<?php
namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\CartInterface;
use App\Services\RealProductCart;
use Illuminate\Support\Facades\Cookie;

/**
 * Summary of CartRepository
 */
class CookieCartRepository implements CartInterface
{
    protected $items;
    protected $minutes;
    protected $cart;

    public function __construct()
    {
        $this->items = collect([]);
        $this->minutes = 43200; // 30days
        $this->cart = new RealProductCart();



    }
    protected function cookieItem()
    {
        if (Cookie::get('shopping_cart')) {
            $cart_data = $this->cart->getCart(Cookie::get('shopping_cart'));
        } else {
            $cart_data = array();
        }
        return $cart_data;
    }
    public function get()
    {
        return $this->cookieItem();
    }

    /**
     * Summary of add
     * @param \App\Models\Product $product
     * @param mixed $quantity
     * @return mixed
     */
    public function add(Product $product, $quantity = 1)
    {

        $prod_id = $product->id;
        $cart_data = $this->cookieItem();

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;


        if (in_array($prod_id_is_there, $item_id_list)) {

            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $prod_id) {
                    $o_quantity = $cart_data[$keys]["item_quantity"];
                }
            }
            return $this->update($prod_id, $o_quantity + 1);
        } else {
            $prod_name = $product->name;
            if ($product) {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_quantity' => $quantity,
                    'item_price' => $product->price,
                    'item_name' => $prod_name,
                    'item_total_price' => $product->price * $quantity,
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);

                Cookie::queue(Cookie::make('shopping_cart', $item_data, $this->minutes));
                return response()->json(['status' => '"' . $prod_name . '" Added to Cart']);
            }
        }
    }

    public function update($id, $quantity)
    {
        $cart_data = $this->cookieItem();
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]["item_id"] == $id) {
                $cart_data[$keys]["item_quantity"] = $quantity;
                $cart_data[$keys]["item_total_price"] = $cart_data[$keys]["item_price"] * $quantity;
                $item_data = json_encode($cart_data);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status' => ' cart is updatedz<', 'status2' => '2']);
            }
        }
    }

    public function delete($id)
    {

        $cart_data = $this->cart->getCart($this->get());

        $item_id_list = array_column($cart_data, 'item_id');
        $id_is_there = $id;

        if (in_array($id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $id) {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status' => 'Item Removed from Cart']);
                }
            }
        }
    }

    public function empty()
    {
        Cookie::queue(Cookie::forget('shopping_cart'));
        return response()->json(['status' => 'All Items Removed from Cart']);
    }

    public function total()
    {
       
         $cart_data = $this->get();
        if ($cart_data == null) {
            return 0;
        } else {
            return count($cart_data);
        }
    }
    public function totalPrice()
    {
        $cart = $this->get();
        $total_price = 0;
        if ($cart != null) {
            foreach ($cart as $keys) {
                $total_price += ($keys['item_price'] * $keys['item_quantity']);
            }
        }
        return $total_price;

    }
}