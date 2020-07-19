<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create() {
        return view('admin.blogs.create');
    }

    public function store(Request $request) {
        $rules = [
            'title' => 'required',
        ];

        $messages = [
            'title.required' => 'Title is required'
        ];

        $validator = validator()->make($request->all(), $rules, $messages);
        if($validator->fails()) {
            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $image = $request->file('featured_image');
            if(!empty($image)) {
                $imagePath = substr($image->store("/public/blogs"), 6);
            }
            Blog::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'published' => $request->input('published'),
                'featured_image' => $imagePath ?? "",
            ]);
            return redirect()->route("blogs.index")->with("success", "Blog successfully created");
        }
        return redirect()->back()->with("error", "Failed to create blog");
    }

    public function edit($id) {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id) {
        $blog = Blog::findOrFail($id);
        $rules = [
            'title' => 'required',
        ];

        $messages = [
            'title.required' => 'Title is required'
        ];

        $validator = validator()->make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $image = $request->file('featured_image');
            if(!empty($image)) {
                $imagePath = substr($image->store("/public/blogs"));
                $blog->featured_image = $imagePath;
            }
            $blog->title = $request->input('title');
            $blog->content = $request->input('content');
            $blog->published = $request->input('published');
            $blog->save();
            return redirect()->route("blogs.index")->with("success", "Blog successfully updated");
        }
        return redirect()->back()->with("error", "Failed to update blog");
    }

    public function destroy($id) {
        try {
            Blog::find($id)->delete();
            return redirect()->route('blogs.index')->with('success', "Blog successfully removed");
        } catch (\Throwable $th) {
            return redirect()->route('blogs.index')->with('error', "Failed to remove blog");
        }
    }
}
