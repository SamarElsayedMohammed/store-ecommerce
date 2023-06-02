<?php

namespace App\View\Components\Front;

use App\Facades\Cart;
use Illuminate\View\Component;
use App\Interfaces\CartInterface;

class CartMenu extends Component
{
    public $items;

    public $total;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // use facade

        // $this->items = Cart::get();
        // $this->total = Cart::total();

        // use service container

        // $this->items = $cart->get();
        // $this->total = $cart->total();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('front.cart-menu');
    }
}