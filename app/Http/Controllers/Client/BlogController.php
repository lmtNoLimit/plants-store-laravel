<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BlogController extends Controller
{
    public function index() {
        $latestBlogs = Blog::latest()->where('published', 1)->paginate(6);
        $recentBlogs = Blog::latest()->skip(6)->take(3)->get();
        $categories = Category::latest()->get();
        return view('client.blog', compact('categories', 'latestBlogs', 'recentBlogs'));
    }

    public function show($id) {
        $blog = Blog::findOrFail($id);
        return view('client.blog-details', compact('blog'));
    }
}
