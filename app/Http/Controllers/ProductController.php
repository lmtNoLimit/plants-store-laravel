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
            'price' => 'required|min:0',
            'sale_price' => 'nullable|lt:price',
            'quantity' => 'required|min:0'
        ];

        $messages = [
            'name.required' => 'Product title is required',
            'category_id.required' => 'Category is required',
            'price.required' => 'Price is required',
            'price.required' => 'Price must be larger or equal to 0',
            'sale_price.lt' => 'Sale price must be less than original price',
            'quantity.required' => 'Quantity is required',
            'quantity.min' => 'Quantity must be larger or equal to 0'
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
            $product->quantity = $request->input('quantity');
            $product->price = $request->input('price');
            $product->sale_price = $request->input('sale_price');
            $product->save();
            if(!empty($images)) {
                foreach($images as $image) {
                    $imagePath = $image->store('/public/products');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => substr($imagePath, 6)
                    ]);
                }
            }
            return redirect()->route("products.index")->with("success", "Product successfully created");
        }
        return redirect()->back()->with("error", "Failed to create product");
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|min:0',
            'sale_price' => 'nullable|lt:price',
            'quantity' => 'required|min:0'
        ];

        $messages = [
            'name.required' => 'Product title is required',
            'category_id.required' => 'Category is required',
            'price.required' => 'Price is required',
            'price.required' => 'Price must be larger or equal to 0',
            'sale_price.lt' => 'Sale price must be less than original price',
            'quantity.required' => 'Quantity is required',
            'quantity.min' => 'Quantity must be larger or equal to 0'
        ];

        $validator = validator()->make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $images = $request->file('images');
            $quantity = $request->input('quantity');
            if($request->input('adjustment') == 'on') {
                $product->quantity += $quantity;
            } else {
                $product->quantity = $quantity;
            }
            $product->save();
            $product->update([
                'name' => $request->input('name'),
                'category_id' => $request->input('category_id'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'sale_price' => $request->input('sale_price'),
            ]);
            if(!empty($images)) {
                foreach($images as $image) {
                    $imagePath = $image->store('/public/products');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => substr($imagePath, 7)
                    ]);
                }
            }
            return redirect()->route("products.index")->with("success", "Product successfully updated");
        }
        return redirect()->back()->with("error", "Failed to update product");
    }

    public function destroy($id) {
        try {
            $product = Product::findOrFail($id);
            foreach($product->images as $image) {
                Storage::delete($image->image);
                Image::where('product_id', $id)->get()->delete();
            }
            $product->delete();
            return redirect()
                ->route('products.index')
                ->with('success', "Product successfully removed");
        } catch (\Throwable $th) {
            return redirect()
                ->route('products.index')
                ->with('error', "Failed to remove product");
        }
    }
}
