<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class ModeratorController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware(['permission:users_create'])->only('create');
        $this->middleware(['permission:users_update'])->only('edit');
        $this->middleware(['permission:users_delete'])->only('destroy');

    }//end of constructor


    public function index()
    {

        try {
            $admins = Admin::whereRoleIs('admin')->paginate(8);
            return view('dashboard..page.user.index', compact('admins'));
        } catch (\Exception $ex) {
            toast(__('site.error'),'error');
            return redirect()->route('admin.dashboard');
        }

    }//end of index


    public function create()
    {
        try {
            return view('dashboard..page.user.create');
        } catch (\Exception $ex) {
            toast(__('site.error'), 'error');
            return redirect()->route('admin.dashboard');
        }
    }//end of create


    public function store(Request $request)
    {


            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'image' => 'image',
                'password' => 'required|confirmed',
                'permissions' => 'required|min:1'
            ]);

            $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
            $request_data['password'] = bcrypt($request->password);
//        image
            if ($request->image) {
                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('uploads/user/' . $request->image->hashName()));

                $request_data['image'] = $request->image->hashName();
            }

            $user = Admin::create($request_data);
            $user->attachRole('admin');
            $user->syncPermissions($request->permissions);


            if (!$user) {
                toast(__('site.error'), 'error');
                return redirect()->route('moderator.index')->with('error', __('site.error'));
            }

        toast(__('site.added_successfully'), 'success');
            return redirect()->route('moderator.index');

    }//end of store


    public function edit($id)
    {
        try {
            $admin = Admin::findOrFail($id);
            return view('dashboard..page.user.edit', compact('admin'));
        } catch (\Exception $ex) {
            toast(__('site.error'), 'error');
            return redirect()->route('admin.dashboard');
        }

    }//end of edit

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([

            'name' => 'required',
            'email' => ['required', Rule::unique('admins')->ignore($admin->id),],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->except(['permissions', '_token', '_method', 'image']);


        if ($request->image) {

            if ($admin->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/user/' . $admin->image);

            }//end of inner if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of external if

        $create = $admin->update($request_data);

        $perm = $admin->syncPermissions($request->permissions);



        toast(__('site.updated_successfully'), 'success');
        return redirect()->route('moderator.index');

    }//end of update


    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->image !== 'default.png') {
            Storage::disk('public_uploads')->delete('/user/' . $admin->image);
        }
        $del = $admin->delete();
        if (!$del)
            toast('هناك خطأ الان', 'error');


        toast(__('site.deleted_successfully'), 'success');
        return redirect()->route('moderator.index');

    }//end of destroy

}//end of controller
