<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $products = Product::latest()->take(8)->get();
        $categories = Category::latest()->get();
        $blogs = Blog::latest()->where('published', 1)->take(3)->get();
        return view('client.index', compact('products', 'categories', 'blogs'));
    }

    public function dashboard() {
        return view('admin.dashboard');
    }
}
