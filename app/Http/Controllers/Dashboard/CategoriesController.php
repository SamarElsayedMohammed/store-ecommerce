<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\DeleteTransEvent;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainCategoryRequest;
use App\Models\Scopes\CategoryScope;
use Illuminate\Support\Facades\Gate;

class CategoriesController extends Controller
{
    public function index()
    {

        // if (Gate::denies('categories.view')) {
        //     return abort(403);
        // }

        $this->authorize('view-any', Category::class);

        $mainCategories = Category::whereNull('parent_id')->withoutGlobalScope(CategoryScope::class)->get();
        // return $mainCategories;
        return view('dashboard.categories.index', compact('mainCategories'));
    }
    public function create()
    {
        $category = new Category();
        return view('dashboard.categories.create', compact('category'));
    }
    public function store(MainCategoryRequest $request)
    {
        // return $request;

        try {

            DB::beginTransaction();

            //validation

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);


            $category = Category::create($request->except('_token'));

            //save translations

            $category->name = $request->name;
            $category->save();
            // return $category;

            DB::commit();
            return redirect()->route('admin.maincategories.index')->with(['success' => 'تم ألاضافة بنجاح']);

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.maincategories.index')->with(['danger' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }

    public function edit($id)
    {
        $category = Category::withoutGlobalScope(CategoryScope::class)->find($id);

        if (!$category)
            return redirect()->route('admin.maincategories.index')->with(['danger' => 'هذا القسم غير موجود ']);

        return view('dashboard.categories.edit', compact('category'));

    }
    public function update(MainCategoryRequest $request, $id)
    {
        try {

            $category = Category::find($id);
            // return $category;

            if (!$category)
                return redirect()->route('dashboard.categories.index')->with(['danger' => 'هذا القسم غير موجود']);

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $category->update($request->all());

            //save translations
            $category->name = $request->name;
            $category->save();

            return redirect()->route('admin.maincategories.index')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.maincategories.index')->with(['danger' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function delete($id)
    {

        try {
            //get specific categories and its translations
            $category = Category::orderBy('id', 'DESC')->find($id);

            if (!$category)
                return redirect()->route('admin.maincategories.index')->with(['danger' => 'هذا القسم غير موجود ']);

            event('deleteTrans', $category);

            $category->delete();

            return redirect()->route('admin.maincategories.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.maincategories.index')->with(['danger' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function changeStatus($id)
    {
    }



}