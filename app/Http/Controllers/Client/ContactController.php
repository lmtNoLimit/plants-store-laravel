<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class ContactController extends Controller
{
    public function index() {
        $categories = Category::latest()->get();
        return view('client.contact', compact('categories'));
    }
}
