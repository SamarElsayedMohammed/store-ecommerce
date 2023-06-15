<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use Illuminate\Http\Request;
use App\Models\Admin;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('dashboard.profile.edit');
    }
    public function update(ProfileRequest $request)
    {
        $admin = Admin::findorfail($request->id);
        $admin->update($request->all());
        return redirect()->route('admin.profile.edit')->with('success', 'تم تعديل البيانات بنجاح');
    }
}