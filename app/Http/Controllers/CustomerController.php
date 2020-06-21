<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        return view('admin.customers.index');
    }

    public function create() {
        return view('admin.customers.create');
    }
}
