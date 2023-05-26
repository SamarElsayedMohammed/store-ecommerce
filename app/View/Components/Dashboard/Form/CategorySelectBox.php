<?php

namespace App\View\Components\Dashboard\Form;

use App\Models\Category;
use Illuminate\View\Component;

class CategorySelectBox extends Component
{

    public $parents;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->parents = Category::all()->pluck('name', 'id')->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.form.category-select-box');
    }
}
