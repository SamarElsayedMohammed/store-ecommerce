<?php

namespace App\View\Components\Front;

use App\Models\Category;
use Illuminate\View\Component;

class DepartmentsComponent extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = Category::parent()->take(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('front.includes.departments-component');
    }
}