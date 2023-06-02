<?php

namespace App\View\Components\Dashboard\Form;

use App\Models\Brand;
use Illuminate\View\Component;

class BrandsSelectBox extends Component
{

    public $brands;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->brands =  Brand::all()->pluck('name', 'id')->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.form.brands-select-box');
    }
}
