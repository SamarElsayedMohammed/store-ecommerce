<?php

namespace App\View\Components\Front;

use Illuminate\View\Component;

class WishListComponent extends Component
{
    public $wish_list;
    public $count;
    public $total;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

        $wishlist = auth()->user()
            ->wishlist()
            ->latest()
            ->get();
        $this->count = count($wishlist);
        $this->wish_list = $wishlist->take(2);
        $this->total = $wishlist->sum('price');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('front.home.wish-list-component');
    }
}