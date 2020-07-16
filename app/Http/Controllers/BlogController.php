<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view('admin.blogs.index');
    }

    public function create() {
        return view('admin.blogs.create');
    }

    public function store(Request $request) {

    }

    public function edit($id) {

    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {
        
    }
}
