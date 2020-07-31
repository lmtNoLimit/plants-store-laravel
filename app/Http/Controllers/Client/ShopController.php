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
        $categoryFilter = request()->get('category');
        if(isset($categoryFilter)) {
            $products = Product::latest('products.created_at')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->where('categories.slug', $categoryFilter)
                ->select('products.id', 'name', 'description', 'quantity', 'products.created_at', 'price', 'sale_price')
                ->paginate(15);
        }
        else {
            $products = Product::latest('products.created_at')->paginate(15);
        }


        $categories = Category::latest()->get();
        return view('client.shop-grid', compact('categories', 'products'));
    }
}
