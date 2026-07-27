<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LegalRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $rows = DB::table('legal_registrations')->orderBy('order', 'asc')->orderBy('id', 'asc')->get();
        $showAddForm = $request->boolean('add');
        return view('admin.legal_registrations.index', compact('rows', 'showAddForm'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'authority'    => 'required|string|max:255',
            'reg_no'       => 'nullable|string|max:255',
            'date_of_reg'  => 'nullable|string|max:255',
            'renewal_info' => 'nullable|string|max:255',
            'order'        => 'nullable|integer',
        ]);

        $data['order'] = $request->order ?? 0;
        $data['is_active'] = $request->has('is_active');

        DB::table('legal_registrations')->insert($data);

        return redirect()->back()->with('success', 'Legal registration added successfully.');
    }

    public function edit($id)
    {
        $row = DB::table('legal_registrations')->where('id', $id)->first();
        return view('admin.legal_registrations.edit', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'authority'    => 'required|string|max:255',
            'reg_no'       => 'nullable|string|max:255',
            'date_of_reg'  => 'nullable|string|max:255',
            'renewal_info' => 'nullable|string|max:255',
            'order'        => 'nullable|integer',
        ]);

        $data['order'] = $request->order ?? 0;
        $data['is_active'] = $request->has('is_active');

        DB::table('legal_registrations')->where('id', $id)->update($data);

        return redirect()->route('admin.legal_registrations.index')->with('success', 'Legal registration updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('legal_registrations')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Legal registration deleted successfully.');
    }
}
