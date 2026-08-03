<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    // Index - All Contacts
    public function index()
    {
        $contacts = DB::table('contacts')->orderBy('id', 'desc')->get();
        return view('admin.contact.index', compact('contacts'));
    }

    // Add Contact Form
    public function add()
    {
        return view('admin.contact.add');
    }

    // Store Contact
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|in:head_office,branch,person',
            'title' => 'required_if:type,person',
            'address' => 'required_if:type,head_office,branch',
            'name' => 'required_if:type,person',
            'mobile' => 'nullable',
            'email' => 'nullable|email',
            'status' => 'required|in:active,inactive'
        ]);

        DB::table('contacts')->insert([
            'type' => $request->type,
            'title' => $request->title,
            'address' => $request->address,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('contact.index')->with('success', 'Contact added successfully');
    }

    // Edit Contact Form
    public function edit($id)
    {
        $contact = DB::table('contacts')->where('id', $id)->first();
        return view('admin.contact.edit', compact('contact'));
    }

    // Update Contact
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type' => 'required|in:head_office,branch,person',
            'title' => 'required_if:type,person',
            'address' => 'required_if:type,head_office,branch',
            'name' => 'required_if:type,person',
            'mobile' => 'nullable',
            'email' => 'nullable|email',
            'status' => 'required|in:active,inactive'
        ]);

        DB::table('contacts')->where('id', $id)->update([
            'type' => $request->type,
            'title' => $request->title,
            'address' => $request->address,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'status' => $request->status,
            'updated_at' => now()
        ]);

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully');
    }

    // Delete Contact
    public function destroy($id)
    {
        DB::table('contacts')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully');
    }
}
