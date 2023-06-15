<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\File;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Traits\FileTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\BrandRequest;

class BrandsControlller extends Controller
{
    use FileTrait;

    public function index()
    {

        $brands = Brand::all();

        return view('dashboard.brands.index', compact('brands'));
    }

    public function create()
    {
        $brand = new Brand();
        return view('dashboard.brands.create', compact('brand'));
    }
    public function store(BrandRequest $request)
    {

        DB::beginTransaction();
        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);

        $brand = Brand::create($request->except('_token', 'photo'));
        //save translations
        $brand->name = $request->name;
        $brand->save();
        $fileName = "";

        if ($request->has('photo')) {
            $image = $request->photo;
            $type = $this->FileType($image->getClientOriginalExtension());
            $fileName = $this->saveImage($image, 'images', 'brands');

            $images = new File();
            $images->file_name = $fileName;
            $images->Fileable_id = $brand->id;
            $images->Fileable_type = get_class($brand);
            $images->type = $type;
            $images->save();
        }
        DB::commit();
        return redirect()->route('admin.brands.index')->with(['success' => 'تم ألاضافة بنجاح']);



    }
    public function edit($id)
    {
        $brand = Brand::with(['file'])->find($id);

        if (!$brand)
            return redirect()->route('admin.brands')->with(['error' => 'هذا الماركة غير موجود ']);

        return view('dashboard.brands.edit', compact('brand'));


    }
    public function update(BrandRequest $request, $id)
    {
        try {

            $brand = Brand::find($id);

            if (!$brand)
                return redirect()->route('admin.brands')->with(['error' => 'هذا الماركة غير موجود']);


            DB::beginTransaction();
            $oldImage = '';

            if ($request->has('photo')) {


                $image = $request->photo;

                $type = $this->FileType($image->getClientOriginalExtension());
                $fileName = $this->saveImage($image, 'images', 'brands');
                $newImage = File::where('Fileable_id', $id)->where('Fileable_type', get_class($brand))->first();


                if ($newImage) {
                    $oldImage = $newImage->file_name;
                    $newImage->delete();
                    $this->deleteImage($oldImage);
                }
                $this->saveFile($brand, $fileName, $type);


            }

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $brand->update($request->except('_token', 'id', 'photo'));

            //save translations
            $brand->name = $request->name;
            $brand->save();

            DB::commit();
            return redirect()->route('admin.brands.index')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.brands.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function delete($id)
    {

        try {
            //get specific categories and its translations
            $brand = Brand::find($id);

            if (!$brand)
                return redirect()->route('admin.brands.index')->with(['error' => 'هذا الماركة غير موجود ']);
            $image = File::where('Fileable_id', $id)->where('Fileable_type', get_class($brand))->first();
            $this->deleteImage($image->file_name);
            $image->delete();

            $brand->delete();

            return redirect()->route('admin.brands.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.brands.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    function saveFile($brand, $fileName, $type)
    {
        $images = new File();
        $images->file_name = $fileName;
        $images->Fileable_id = $brand->id;
        $images->Fileable_type = get_class($brand);
        $images->type = $type;
        $images->save();
    }
}