<?php

namespace App\View\Components\Dashboard\Layouts;

use App\Models\Category;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public $title;

    public function __construct($title = null, $MainCatCount = null)
    {
        $this->title = $title ?? config('app.name');
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('dashboard.layouts.admin');
    }
}