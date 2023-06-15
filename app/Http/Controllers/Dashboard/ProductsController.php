<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\File;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\FileTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ProductPriceRequest;
use App\Http\Requests\Admin\ProductStockRequest;
use App\Http\Requests\Admin\ProductImagesRequest;
use App\Models\Scopes\ProductScope;

class ProductsController extends Controller
{
    use FileTrait;
    public function index()
    {
        $products = Product::withoutGlobalScope(ProductScope::class)->get();

        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {

        $product = new Product();
        return view('dashboard.products.create', compact('product'));

    }
    public function store(Request $request)
    {
        // return$request;

        DB::beginTransaction();

        //validation

        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);

        $product = Product::create([
            'slug' => $request->slug,
            'price' => 0,
            'brand_id' => $request->brand_id,
            'is_active' => $request->is_active,
            'manage_stock' => false,
            'in_stock' => false
        ]);
        //save translations
        $product->name = $request->name;

        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();

        //save product categories

        $product->categories()->attach($request->category_id);

        //save product tags
        $product->tags()->attach($request->tags_id);

        DB::commit();
        return redirect()->route('admin.products.index')->with(['success' => 'تم ألاضافة بنجاح']);



    }


    public function getPrice($product_id)
    {
        $product = new Product();

        return view('dashboard.products.prices.create')->with(['id' => $product_id, 'product' => $product]);
    }

    public function saveProductPrice(ProductPriceRequest $request)
    {

        // return $request;
        try {

            Product::whereId($request->product_id)->update($request->only(['price', 'special_price', 'special_price_type', 'special_price_start', 'special_price_end']));

            return redirect()->route('admin.products.index')->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $ex) {

        }
    }



    public function getStock($product_id)
    {

        return view('dashboard.products.stock.create')->with('id', $product_id);
    }

    public function saveProductStock(ProductStockRequest $request)
    {



        Product::whereId($request->product_id)->update($request->except(['_token', 'product_id']));

        return redirect()->route('admin.products.index')->with(['success' => 'تم التحديث بنجاح']);

    }



    public function addImages($product_id)
    {
        $product = Product::find($product_id);

        if (!$product)
            return redirect()->back()->with(['danger' => 'هذا المنتج غير موجود']);

        $images = $product->file;

        return view('dashboard.products.images.create')->with(['id' => $product_id, 'images' => $images]);
    }


    //to save images to folder only
    public function saveProductImages(Request $request)
    {
        $file = $request->file('dzfile');
        $file_name = uniqid() . '_' . '.' . $file->getClientOriginalExtension();
        $file->storeAs('tmp', $file_name, 'public');
        return response()->json([
            'name' => $file_name,
            'original_name' => $file->getClientOriginalName(),
        ]);

    }
    public function saveProductImagesDB(ProductImagesRequest $request)
    {


        try {
            $product = Product::find($request->product_id);
            if (!$product)
                return redirect()->back()->with(['danger' => 'هذا المنتج غير موجود']);

            // save dropzone images
            if ($request->has('document') && count($request->document) > 0) {
                foreach ($request->document as $image) {

                    $exists = Storage::disk('public')->exists('tmp/' . $image);
                    if (!$exists)
                        return redirect()->back()->with(['danger' => 'هذا الصور غير موجود']);

                    Storage::disk('public')->move('tmp/' . $image, 'uploads/images/products/' . $image);

                    $images = new File();
                    $images->file_name = 'storage/uploads/images/products/' . $image;
                    $images->Fileable_id = $request->product_id;
                    $images->Fileable_type = get_class($product);
                    $images->type = 'image';
                    $images->save();
                }
            }

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.brands.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);


        }
    }
    public function deleteProductImageDB(Request $request)
    {

        $image = json_decode(($request->imageProduct));

        $image_id = $image->image_id;
        $product_id = $image->product_id;
        $findImage = File::where('Fileable_id', $product_id)->where('id', $image_id)->first();

        if (!$findImage) {
            session()->flash('danger', 'هذه الصوره غير موجوده');
            return response()->json([
                'responce' => 'error',

            ]);
        } else {
            $this->deleteImage($findImage->file_name);
            $findImage->delete();
            session()->flash('success', 'تم حذف الصوره بنجاح');


            return response()->json([
                'responce' => 'ok',

            ]);
        }

    }

    public function DeleteTemImage($filename)
    {
        Storage::disk('public')->delete('tmp/' . $filename);
        return response()->json([
            'responce' => 'ok',

        ]);

    }

}