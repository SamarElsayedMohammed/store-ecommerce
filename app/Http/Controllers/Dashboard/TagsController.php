<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagsRequest;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.tags.index', compact('tags'));
    }

    public function create()
    {
        $tag = new Tag();
        return view('dashboard.tags.create', compact('tag'));
    }

    public function store(TagsRequest $request)
    {
        DB::beginTransaction();

        $tag = Tag::create(['slug' => $request->slug]);

        //save translations
        $tag->name = $request->name;
        $tag->save();
        DB::commit();
        return redirect()->route('admin.tags.index')->with(['success' => 'تم ألاضافة بنجاح']);
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        if (!$tag)
            return redirect()->route('admin.tags.index')->with(['error' => 'هذا الماركة غير موجود ']);

        return view('dashboard.tags.edit', compact('tag'));
    }

    public function update(TagsRequest $request, $id)
    {
        try {

            $tag = Tag::find($id);

            if (!$tag)
                return redirect()->route('admin.tags.index')->with(['error' => 'هذا الماركة غير موجود']);


            DB::beginTransaction();


            $tag->update($request->except('_token', 'id')); // update only for slug column

            //save translations
            $tag->name = $request->name;
            $tag->save();

            DB::commit();
            return redirect()->route('admin.tags.index')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('admin.tags.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function delete($id)
    {
        try {
            //get specific categories and its translations
            $tags = Tag::find($id);

            if (!$tags)
                return redirect()->route('admin.tags.index')->with(['error' => 'هذا الماركة غير موجود ']);

            $tags->delete();

            return redirect()->route('admin.tags.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.tags.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
}