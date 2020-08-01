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
        $latestProducts = Product::latest()->take(6)->get();
        $categories = Category::latest()->get();
        return view('client.shop-grid', compact('categories', 'products', 'latestProducts'));
    }

    public function show($id) {
        $categories = Category::latest()->get();
        $product = Product::findOrFail($id);
        $relatedProducts = Product::latest()
            ->where('category_id', $product->category_id)
            ->whereNotIn('id', [$product->id])
            ->take(4)
            ->get();
        return view('client.shop-details', compact('categories', 'product', 'relatedProducts'));
    }
}
