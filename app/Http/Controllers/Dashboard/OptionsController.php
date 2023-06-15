<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Option;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionsRequest;

class OptionsController extends Controller
{
    public function index()
    {
        $options = Option::with([
            'product' => function ($prod) {
                $prod->select('id');
            },
            'attribute' => function ($attr) {
                $attr->select('id');
            }
        ])->select('id', 'product_id', 'attribute_id', 'price')->paginate(PAGINATION_COUNT);

        return view('dashboard.options.index', compact('options'));
    }

    public function create()
    {
        $data = [];
        $data['products'] = Product::select('id')->get()->pluck('name', 'id');
        $data['attributes'] = Attribute::select('id')->get()->pluck('name', 'id');
        $data['option'] = new Option();


        return view('dashboard.options.create', $data);
    }

    public function store(OptionsRequest $request)
    {


        DB::beginTransaction();

        //validation
        $option = Option::create([
            'attribute_id' => $request->attribute_id,
            'product_id' => $request->product_id,
            'price' => $request->price,
        ]);
        //save translations
        $option->name = $request->name;
        $option->save();
        DB::commit();

        return redirect()->route('admin.options.index')->with(['success' => 'تم ألاضافة بنجاح']);
    }

    public function edit($optionId)
    {

        $data = [];
        $data['option'] = Option::find($optionId);

        if (!$data['option'])
            return redirect()->route('admin.options.index')->with(['danger' => 'هذه القيمة غير موجود ']);

        $data['products'] = Product::select('id')->get()->pluck('name', 'id');
        $data['attributes'] = Attribute::select('id')->get()->pluck('name', 'id');

        return view('dashboard.options.edit', $data);

    }

    public function update($id, OptionsRequest $request)
    {
        try {

            $option = Option::find($id);

            if (!$option)
                return redirect()->route('admin.options.index')->with(['danger' => 'هذا ألعنصر غير موجود']);

            $option->update($request->only(['price', 'product_id', 'attribute_id']));
            //save translations
            $option->name = $request->name;
            $option->save();

            return redirect()->route('admin.options.index')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.options.index')->with(['danger' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function delete($id)
    {

        try {
            //get specific categories and its translations
            $option = Option::orderBy('id', 'DESC')->find($id);

            if (!$option)
                return redirect()->route('admin.options.index')->with(['danger' => 'هذا الخاصيه غير موجود ']);

            $option->delete();

            return redirect()->route('admin.options.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.options.index')->with(['danger' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}