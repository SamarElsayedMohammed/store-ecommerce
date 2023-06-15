<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['upper_slider'] = Slider::where('for', 'upper')->with('file')->first();
        $data['categories'] = Category::parent()->select('id', 'slug')->with([
            'products' => function ($q) {
                $q->select('slug', 'products.id')->limit(5);
            }
        ])->limit(6)->get();
        $data['products'] = Product::with(['file', 'categories'])->limit(8)->latest()->get();
        $data['brands'] = Brand::limit(7)->latest()->get();

        // return $data['products'][10]->categories[0]->name;
        return view('front.home')->with($data);
    }
}