<?php

namespace App\View\Components\Dashboard\Includes;

use App\Models\Category;
use Illuminate\View\Component;

class SideMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $MainCatCount;

    public function __construct($MainCatCount = null)
    {
        $this->MainCatCount = $MainCatCount ?? Category::parent()->count();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.includes.sidebare');
    }
}