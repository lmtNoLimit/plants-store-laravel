<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CustomerController extends Controller
{
    public function index() {
        return view('admin.customers.index');
    }

    public function create() {
        return view('admin.customers.create');
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
