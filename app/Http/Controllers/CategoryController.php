<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
        /**['categories' => $categories] */
    }
    
    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $rules = [
            'title' => 'required|unique:categories',
        ];

        $messages = [
            'title.required' => "Title is required",
            'title.unique' => "Title is already exist"
        ];

        $validator = validator()->make($request->all(), $rules, $messages); 
        /**Kiểm tra điều kiện các input nhập vào */
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $title = $request->input('title');
            $image = $request->file('featured_image');
            
            if(!empty($image)) {
                $imagePath = substr($image->store('/public/categories'), 6);
            }
            Category::create([
                'title' => $title,
                'slug' => Str::slug($title, '_'),
                'featured_image' => $imagePath ?? ""
            ]);
            return redirect()->route("categories.index")->with("success", "Category successfully created");
        }
        return redirect()->back()->with("error", "Failed to create category");
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $rules = [
            'title' => [
                'required',
                "unique:categories,title,$id",
            ],
        ];
        
        $messages = [
            'title.required' => "Title is required",
            'title.unique' => "Title is already exist"
        ];

        $validator = validator()->make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $title = $request->input('title');
            $image = $request->file('featured_image');
            if(!empty($image)) {
                $imagePath = $image->store('/public/categories');
            }
            $category->update([
                'title' => $title,
                'slug' => Str::slug($title, '_'),
                'featured_image' => substr($imagePath, 6)
            ]);
            return redirect()->route("categories.index")->with("success", "Category successfully updated");
        }
        return redirect()->back()->with("error", "Failed to update category");
    }

    public function destroy($id) {
        try {
            Category::find($id)->delete();
            return redirect()->route('categories.index')->with('success', "Category successfully removed");
        } catch (\Throwable $th) {
            return redirect()->route('categories.index')->with('error', "Failed to remove category");
        }
    }
}
