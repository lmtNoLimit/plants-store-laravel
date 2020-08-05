<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Contact;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function store(Request $request) {
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);
        return redirect()->back()->with('success', 'Cảm ơn bạn đã liên lạc với chúng tôi. Chúng tôi sẽ liên lạc với bạn trong vòng 3 ngày tới');
    }

    public function destroy($id) {
        try {
            Contact::findOrFail($id)->delete();
            return redirect()->route('contacts.index')->with('success', "Successfully removed");
        } catch (\Throwable $th) {
            return redirect()->route('contacts.index')->with('error', "Failed to remove contact");
        }
    }
}
