<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Brand;
use App\Models\Option;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\DataTables\UsersDataTable;
use App\Models\ProductTranslation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index(Request $request, $slug)
    {

        if ($request->ajax()) {
            if ($slug === 'all') {
                $data = Product::with([
                    'file' => function ($q) {
                        $q->select('file_name', 'Fileable_id')->take(1);
                    }
                ])->select('id', 'slug', 'price')->get();
            } else {
                $cat_products = Category::with([
                    'products' => function ($q) {
                        $q->with([
                            'file' => function ($q) {
                                $q->select('file_name', 'Fileable_id')->take(1);
                            }
                        ])->select('products.id', 'slug', 'price');
                    }
                ])->where('slug', $slug)->first();
                $data = $cat_products->products;
            }
            return DataTables::of($data)->addColumn('details', function ($product) {
                return view('front.products.includes.row', compact('product'))->render();
            })
                ->rawColumns(['details'])->make(true);
            ;
        }


        return view('front.products.index', compact('slug'));
    }

    public function productsDetails($slug)
    {

        $data['product'] = Product::with(['file', 'categories'])->where('slug', $slug)->first();

        $product_id = $data['product']->id;
        $product_categories_ids = $data['product']->categories->pluck('id');

        // return Option::where('product_id',$product_id)->get();

        $data['product_attributes'] = Attribute::whereHas('options', function ($q) use ($product_id) {
            $q->whereHas('product', function ($qq) use ($product_id) {
                $qq->where('product_id', $product_id);
            });
        })->with([
                'options' => function ($qqq) use ($product_id) {
                    $qqq->where('product_id', $product_id);
                }
            ])->get();

        $data['related_products'] = Product::whereHas('categories', function ($cat) use ($product_categories_ids) {
            $cat->whereIn('categories.id', $product_categories_ids);
        })->limit(20)->latest()->get();
        return view('front.products.single')->with($data);


    }
    function generateNGrams($word, $n)
    {
        $ngrams = [];
        $length = strlen($word);
        for ($i = 0; $i < $length - $n + 1; $i++) {
            $ngrams[] = substr($word, $i, $n);
        }
        return $ngrams;
    }

    public function ProductSearch()
    {
        $searchQuery = $_GET['search'] ?? '';
        // $searchQuery = "searhc fiedsl to";
        $ngramSize = 4;
        $results = DB::table('product_translations')
            ->where(function ($query) use ($searchQuery, $ngramSize) {
                $tokens = explode(" ", $searchQuery);
                foreach ($tokens as $token) {
                    $ngrams = $this->generateNGrams($token, $ngramSize);
                    foreach ($ngrams as $ngram) {
                        $query->orWhere(function ($query) use ($ngram) {
                            $query->whereRaw("MATCH (name,description,short_description) AGAINST (? IN BOOLEAN MODE)", [$ngram])
                                ->orWhere('name', 'LIKE', "%{$ngram}%")->orWhere('description', 'LIKE', "%{$ngram}%")->orWhere('short_description', 'LIKE', "%{$ngram}%");
                        });
                    }
                }
            })
            ->get();

        $products = $results->map(function ($item) {
            return Product::find($item->product_id);
        })->reject(null);
        $products;
        return view('front.products.index', compact('products'));

    }
}