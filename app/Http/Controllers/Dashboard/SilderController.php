<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\File;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\SliderRequest;

class SilderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard.sliders.index', compact('sliders'));
    }
    public function create()
    {
        $types = collect(['upper' => 'upper', 'lower' => 'lower']);

        return view('dashboard.sliders.create', compact('types'));


    }
    public function store(SliderRequest $request)
    {
        // return $request;
        $slider = Slider::updateOrCreate(
            ['for' => $request->for]
        );
      
        if (!empty($slider->file)) {

            foreach ($slider->file as $file) {

                Storage::disk('public')->delete(str_replace('storage/', '', $file->file_name));
            }
            $slider->file()->delete();
        }
        // save dropzone images
        if ($request->has('document') && count($request->document) > 0) {
            foreach ($request->document as $image) {

                $exists = Storage::disk('public')->exists('tmp/' . $image);
                if (!$exists)
                    return redirect()->back()->with(['danger' => 'هذا الصور غير موجود']);

                Storage::disk('public')->move('tmp/' . $image, 'uploads/images/sliders/' . $image);

                $images = new File();
                $images->file_name = 'storage/uploads/images/sliders/' . $image;
                $images->Fileable_id = $slider->id;
                $images->Fileable_type = get_class($slider);
                $images->type = 'image';
                $images->save();
            }
        }
        return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);


    }
}