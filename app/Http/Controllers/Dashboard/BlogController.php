<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Project;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:blog_read'])->only('index');
        $this->middleware(['permission:blog_create'])->only('create');
        $this->middleware(['permission:blog_update'])->only('edit');
        $this->middleware(['permission:blog_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {


        try {
            $posts = Blog::paginate(10);
            return view('dashboard..page.blog.index', compact('posts'));
        } catch (\Exception $ex) {
            return $ex;
            toast('هناك خطأ!', 'error');
            return redirect()->route('admin.dashboard');
        }

    }//end of index


    public function create()
    {
        try {
            $categories = Category::all();
            return view('dashboard..page.blog.create', compact('categories'));
        } catch (\Exception $ex) {
            return $ex;
            toast(__('site.added_successfully'), 'error');
            return redirect()->route('admin.dashboard');
        }
    }//end of create

    public function store(Request $request)
    {


        //validate
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.*' => 'required'];
        }
        $rules += ['image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:200|required'];
        $rules += ['category_id' => 'required'];
        $rules += ['link'=>'max:300|min:8'];

        $request->validate($rules);

        $request_data = $request->except('image', '_token', '_method', 'featured', 'status', 'admin_id');

        if ($request->image) {
            Image::make($request->image)
                ->resize(258,313 , function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path('uploads/blog/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        if ($request->featured) {

            $request_data['featured'] = 1;
        }

        if ($request->status) {

            $request_data['status'] = 1;
        }

        $request_data['admin_id'] = auth('admin')->id();

        $create = Blog::create($request_data);
        if (!$create) {
            toast('error!', 'error');
            return redirect()->route('blog.index');
        }

        toast(__('site.added_successfully'), 'success');
        return redirect()->route('blog.index');
    }//end of store

    public function edit($id)
    {


            $post = Blog::findOrFail($id);
            $categories = Category::all();
            return view('dashboard.page.blog.edit', compact('post', 'categories'));


    }//end of edit

    public function update(Request $request, $id)
    {

        $post = Blog::findOrFail($id);
        //validate
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.*' => 'required'];
        }
        $rules += ['image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:200|required'];
        $rules += ['link'=>'max:300|min:8'];
        $rules += ['category_id' => 'required'];

        $request->validate($rules);

        $request_data = $request->except('image', '_token', '_method', 'featured', 'status', 'admin_id');

        if ($request->image) {
            if ($post->image != 'blog.png') {

                Storage::disk('public_uploads')->delete('/blog/' . $post->image);

            }//end of inner if
            Image::make($request->image)
                ->resize(258,313 , function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path('uploads/blog/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        if ($request->featured)
            $request_data['featured'] = 1;
        else
            $request_data['featured'] = 0;

        if ($request->status)
            $request_data['status'] = 1;
        else
            $request_data['status'] = 0;

        $request_data['admin_id'] = auth('admin')->id();

        $create = $post->update($request_data);
        if (!$create) {
            toast('error!', 'error');
            return redirect()->route('blog.index');
        }

        toast(__('site.updated_successfully'), 'success');
        return redirect()->route('blog.index');
    }//end of update

    public function destroy($id)
    {
        $post = Blog::findOrFail($id);

        if ($post->image !== 'blog.png') {
            Storage::disk('public_uploads')->delete('/blog/' . $post->image);
        }
        $del = $post->delete();
        if (!$del)
            toast(__('site.error'), 'error');


        toast(__('site.updated_successfully'), 'success');
        return redirect()->route('blog.index');
    }//end of destroy

    public function get()
    {
        try {
            $posts = Blog::where('status',0)->get();
            return view('dashboard.page.blog.show', compact('posts'));
        } catch (\Exception $ex) {
            toast('هناك خطأ!', 'error');
            return redirect()->route('admin.dashboard');
        }
    }//end of show

    public function change($id)
    {
        try {
            $post = Blog::findOrFail($id);

             $post->update([
                 'status'=>1,
             ]);

            toast(__('site.added_successfully'), 'success');
            return view('dashboard..page.blog.show', compact('posts'));
        } catch (\Exception $ex) {
            return $ex;
            toast(__('site.error'), 'error');
            return redirect()->route('admin.dashboard');
        }

    }//end of show






}
