<?php

namespace App\View\Components\Front;

use App\Models\Category;
use Illuminate\View\Component;

class ParentCategoriesComponent extends Component
{
    public $parents;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->parents = Category::parent()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('front.parent-categories-component');
    }
}