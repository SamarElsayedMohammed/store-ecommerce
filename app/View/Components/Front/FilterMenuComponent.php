<?php

namespace App\View\Components\Front;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\Component;

class FilterMenuComponent extends Component
{
    public $categories;
    public $priceRange;
    public $price;
    public $brands;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($slug = 'all')
    {
        $products = Product::all();
        $this->priceRange = array(
            'min' => $products->min('price'),
            'max' => $products->max('price'),
        );
        $this->price = $this->priceFilter($products);

        $this->categories = Category::withCount('products')->get();
        $this->brands = Brand::withCount('products')->get();
    }
    protected function priceFilter($products)
    {
        $min = $products->min('price');
        $max = $products->max('price');
        $step = (int) ($max / 4);
        $price = array(
            '$' . (int) $min . ' - ' . $min + $step
            => $products->whereBetween('price', [$min, $min + 100])->count(),

            '$' . $min + $step . ' - ' . $min + ($step * 2)
            => $products->whereBetween('price', [$min + $step, $min + ($step * 2)])->count(),
            '$' . $min + ($step * 2) . ' - ' . $min + ($step * 3)
            => $products->whereBetween('price', [$min + ($step * 2), $min + ($step * 3)])->count(),
            '$' . $min + ($step * 3) . ' - ' . (int) $max
            => $products->whereBetween('price', [$min + 1000, $max])->count(),
        );
        return $price;

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('front.products.includes.filter-menu-component');
    }
}