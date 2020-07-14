<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ];

        $messages = [

        ];

        $validator = validator()->make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $images = $request->file('images');
            $product = new Product();
            $product->name = $request->input('name');
            $product->category_id = $request->input('category_id');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->sale_price = $request->input('sale_price');
            $product->save();
            if(!empty($images)) {
                foreach($images as $image) {
                    $imagePath = $image->store('products');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $imagePath
                    ]);
                }
            }
            return redirect()->route("products.index")->with("success", "Product successfully created");
        }
        return redirect()->back()->with("error", "Failed to create product");
    }

    public function edit($id) {
        
    }

    public function update(Request $request) {

    }

    public function destroy($id) {

    }
}
