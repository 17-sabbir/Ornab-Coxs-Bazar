<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class policyController extends Controller
{
    //__Create__//
    public function create()
    {
        return view('admin.policy_guideline.add');
    }

    //__store__//
    public function store(Request $request)
    {
        $validatedDate = $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf',
        ]);

        $fileName = '';
        if ($file = $request->file('file')) {
            $fileName = rand(10000, 99999) . 'policy_guideline.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/policy_guideline/'), $fileName);
        }

        $file = [
            'name' => $request->name,
            'file' => $fileName
        ];

        DB::table('policy_guideline')->insert($file);
        return redirect()->back()->with('success', 'Successfully Uploaded');
    }

    //__index__//
    public function index()
    {
        $file = DB::table('policy_guideline')->get();
        return view('admin.policy_guideline.index', compact('file'));
    }

    //__delete__//
    public function destroy($id)
    {
        $file = DB::table('policy_guideline')->where('id', $id)->first();

        $oldFile = public_path('images/policy_guideline/' . $file->file);

        if (file_exists($oldFile)) {
            @unlink($oldFile);
        }

        DB::table('policy_guideline')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    //__edit__//
    public function edit($id)
    {
        $file = DB::table('policy_guideline')->where('id', $id)->first();
        return view('admin.policy_guideline.edit', compact('file'));
    }

    //update//
    public function update(Request $request, $id)
    {
        $validatedDate = $request->validate([
            'name' => 'required',
        ]);

        $files = DB::table('policy_guideline')->where('id', $id)->first();

        $fileName = '';
        $oldFile = public_path('images/policy_guideline/' . $files->file);

        if ($file = $request->file('file')) {
            if (file_exists($oldFile)) {
                @unlink($oldFile);
            }
            $fileName = rand(10000, 99999) . 'policy_guideline.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/policy_guideline/'), $fileName);
        } else {
            $fileName = $files->file;
        }


        $policy_guideline = [
            'name' => $request->name,
            'file' => $fileName
        ];

        DB::table('policy_guideline')->where('id', $id)->update($policy_guideline);
        return redirect()->back()->with('success', 'Successfully Updated');
    }
}
