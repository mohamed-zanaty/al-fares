<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class FrontController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();

        View::share(['setting' => $setting]);
    }

    public function index()
    {
        $categories = Category::all();
        $features = Blog::where('featured', 1)->where('status', 1)->get();
        return \view('front.page.index', compact('features', 'categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        $products = Blog::where('category_id', $id)->where('status', 1)->get();
        return \view('front.page.services', compact('products', 'category'));
    }

    public function contact_index()
    {
        $contacts = Contact::paginate(10);
        return \view('dashboard.page.contact.index', compact('contacts'));
    }

    public function save(Request $request)
    {

        $request_data = $request->validate([
            'email' => 'required|max:40|min:3',
            'phone' => 'max:40|min:3',
            'message' => 'required|max:200|min:3',
        ]);

        $mailTo = Setting::first();

        Mail::to([$mailTo->email,$request_data['email']])->send(new ContactMail($request->all()));

        $create = Contact::create($request_data);

        if (!$create) {
            return redirect()->to('/'.'#form')->with('error', __('site.message_error'));
        }
        return redirect()->to('/'.'#form')->with('success', __('site.message_success'));
    }

    public function contact_delete($id)
    {
        $contact = Contact::findOrFail($id);

        $del = $contact->delete();
        if (!$del)
            toast(__('site.error'), 'error');


        toast(__('site.deleted_successfully'), 'success');
        return redirect()->route('contact.index');
    }
}
