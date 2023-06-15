<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoriesController extends Controller
{
    public function index()
    {
        $subCategories = Category::whereNotNull('parent_id')->paginate(PAGINATION_COUNT);

        return view('dashboard.sub-categories.index', compact('subCategories'));
    }
}