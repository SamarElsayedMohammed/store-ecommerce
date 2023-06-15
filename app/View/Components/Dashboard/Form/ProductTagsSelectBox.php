<?php

namespace App\View\Components\Dashboard\Form;

use App\Models\Tag;
use Illuminate\View\Component;

class ProductTagsSelectBox extends Component
{
    public $tags;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $tags = Tag::all()->pluck('name', 'id');

        $array = $tags->map(function ($item, $key) {
            $val['value'] = $key;
            $val['name'] = $item;
            return $val;

        })->toArray();
        $this->tags = array_values($array);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.form.product-tags-select-box');
    }
}
