<?php

namespace App\View\Components\Front;

use App\Facades\Cart;
use Illuminate\View\Component;
use App\Interfaces\CartInterface;
use App\Repositories\CookieCartRepository;
use App\Services\RealProductCart;

class CartMenu extends Component
{
    public $items;
    public $totalPrice;
    public $total;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CookieCartRepository $cart, RealProductCart $product)
    {
        $this->items = $product->RealProductsDetails(collect($cart->get()));
        $this->total = $cart->total();
        $this->totalPrice = $cart->totalPrice();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('front.home.cart-menu');
    }
}