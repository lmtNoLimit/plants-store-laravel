<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class CustomerController extends Controller
{
    public function index() {
        $customers = User::where('role', 'CUSTOMER')->latest()->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function create() {
        return view('admin.customers.create');
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
            'email' => 'nullable|email|unique:users',
        ];

        $messages = [
            'name.required' => "Name is required",
            'username.required' => 'Username is required',
            'username.unique' => "Username is already exist",
            'phone.required' => "Phone is required",
            'password.required' => "Password is required",
            'password.confirmed' => "Password is not matched",
            'password_confirmation.required' => "Password confirm is required",
            'password_confirmation.same' => "Password is not matched",
            'email.unique' => "Email is already in use",
            'email.email' => "Email is invalid"
        ];

        $validator = validator()->make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            User::create([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
                'gender' => $request->input('gender'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'birthday' => $request->input('birthday'),
                'role' => 'CUSTOMER'
            ]);
            return redirect()->route("customers.index")->with("success", "Customer successfully created");
        }
        return redirect()->back()->with("error", "Failed to create customer");
    }

    public function edit($id) {
        $customer = User::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id) {
        $customer = User::findOrFail($id);
        $rules = [
            'name' => 'required',
            'username' => [
                'required',
                "unique:users,username,$id"
            ],
            'phone' => 'required',
            'email' => [
                'nullable',
                'email',
                "unique:users,email,$id"
            ]
        ];

        $messages = [
            'name.required' => "Name is required",
            'username.required' => 'Username is required',
            'username.unique' => "Username is already exist",
            'phone.required' => "Phone is required",
            'email.unique' => "Email is already in use",
            'email.email' => "Email is invalid"
        ];

        $validator = validator()->make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $customer->update([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
                'gender' => $request->input('gender'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'birthday' => $request->input('birthday'),
            ]);
            return redirect()->route("customers.index")->with("success", "Customer successfully updated");
        }
        return redirect()->back()->with("error", "Failed to update customer");
    }

    public function destroy($id) {
        try {
            User::find($id)->delete();
            return redirect()->route('customers.index')->with('success', "Customer successfully removed");
        } catch (\Throwable $th) {
            return redirect()->route('customers.index')->with('error', "Failed to remove customer");
        }
    }
}
