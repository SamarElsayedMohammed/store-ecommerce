<?php
namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;
use App\Interfaces\CartInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * Summary of CartRepository
 */
class CartRepository implements CartInterface
{
    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }

    /**
     * Summary of get
     * @return \Illuminate\Support\Collection
     */
    public function get(): Collection
    {
        if (!$this->items->count()) {
            $this->items = Cart::with('product')->get();
        }

        return $this->items;
    }

    /**
     * Summary of add
     * @param \App\Models\Product $product
     * @param mixed $quantity
     * @return mixed
     */
    public function add(Product $product, $quantity = 1)
    {
        $item = Cart::where('product_id', '=', $product->id)
            ->first();

        if (!$item) {
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
            $this->get()->push($cart);
            return $cart;
        }

        return $item->increment('quantity', $quantity);
    }

    public function update($id, $quantity)
    {
        Cart::where('id', '=', $id)
            ->update([
                'quantity' => $quantity,
            ]);
    }

    public function delete($id)
    {
        Cart::where('id', '=', $id)
            ->delete();
    }

    public function empty()
    {
        Cart::query()->delete();
    }

    public function total(): float
    {
        /*return (float) Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->selectRaw('SUM(products.price * carts.quantity) as total')
            ->value('total');*/

        return $this->get()->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    }
}