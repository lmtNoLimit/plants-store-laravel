<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ShopController extends Controller
{
    public function index() {
        $search = request()->get('search');
        if(isset($search)) {
            
        }
        $products = Product::latest()->paginate(20);
        $categories = Category::latest()->get();
        return view('client.shop-grid', compact('categories', 'products'));
    }
}
