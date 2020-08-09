<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('dashboard.page.profile.edit');
    }//enf of edit


    public function update(Request $request)
    {

        $admin = Admin::find(auth('admin')->id());
        $request->validate([

            'name' => 'required',
            'email' => ['required', Rule::unique('admins')->ignore($admin->id),],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'required'
        ]);
        $request_data = $request->except('image', '_token', '_method', 'password');


        if (!Hash::check($request->password, $admin->password)) {
            toast('ادخل الباسوورد صحيح', 'error');
            return redirect()->back();
        }

        if ($request->image) {
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }
        $create = $admin->update($request_data);
        if (!$create)
            toast(__('site.error'), 'error');

        toast(__('site.updated_successfully'), 'success');
        return redirect()->route('admin.dashboard')->with('success', __('site.updated_successfully'));
    }//enf of update


    public function update_password(Request $request)
    {

        $admin = Admin::find(auth('admin')->id());

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, $admin->password)) {
            toast('ادخل الباسوورد صحيح', 'error');
            return redirect()->back();
        }

        $create = $admin->update([
            'password'=>bcrypt($request->password),
        ]);

        if (!$create)
            toast(__('site.error'), 'error');

        toast(__('site.updated_successfully'), 'success');
        return redirect()->route('admin.dashboard')->with('success', __('site.updated_successfully'));
    }//enf of update
}//end of controller
