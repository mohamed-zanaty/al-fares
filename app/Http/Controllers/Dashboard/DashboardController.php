<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $categories = Category::count();
        $jobs = Blog::count();
        $admins = Admin::whereRoleIs('admin')->count();
        $contact = Contact::count();




        return view('dashboard.dashboard',compact('contact','categories','jobs','admins'));
    }
}
