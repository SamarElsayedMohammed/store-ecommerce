<?php

namespace App\View\Components\Dashboard\Form;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryTagSelectBox extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct()
    {

        $cats = Category::all()->pluck('name', 'id');

        $ar = $cats->map(function ($item, $key) {
            $val['value'] = $key;
            $val['name'] = $item;
            return $val;

        })->toArray();
        $this->categories = array_values($ar);
    }

    /**
     * Get the view / contents that represent the component.
     *ats
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.form.category-tag-select-box');
    }
}