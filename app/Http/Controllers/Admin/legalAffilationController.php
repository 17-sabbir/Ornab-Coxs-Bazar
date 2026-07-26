<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class legalAffilationController extends Controller
{
    //__Create__//
    public function create(){
        return view('admin.legal_affilation.add');
    }

    //__store__//
    public function store(Request $request){
        $validatedDate = $request->validate([
            'title' => 'required',
            'document' => 'required|mimes:pdf',
        ]);

        $fileName = '';
        if($pdf = $request->file('document')){
            $fileName = rand(10000,99999). 'legal_affilation.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('images/legal_affilation/'),$fileName);
        }

        $data = [
            'title' => $request->title,
            'document' => $fileName
        ];

        DB::table('legal_affilation')->insert($data);
        return redirect()->back()->with('success','Successfully Uploaded Origin and Legal Affilation PDF');
    }

    //__index__//
    public function index(){
        $file = DB::table('legal_affilation')->get();
        return view('admin.legal_affilation.index',compact('file'));
    }

    //__delete__//
    public function destroy($id){
        $file = DB::table('legal_affilation')->where('id',$id)->first();

        $oldFile = public_path('images/legal_affilation/'.$file->document);

        if(file_exists($oldFile)){
            @unlink($oldFile);
        }

        DB::table('legal_affilation')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }

    //__edit__//
    public function edit($id){
        $file = DB::table('legal_affilation')->where('id', $id)->first();
        return view('admin.legal_affilation.edit',compact('file'));
    }

    //update//
    public function update(Request $request, $id)
    {
        $validatedDate = $request->validate([
            'title' => 'required',
        ]);

        $files = DB::table('legal_affilation')->where('id', $id)->first();

        $fileName = '';
        $oldFile = public_path('images/legal_affilation/'.$files->document);

        if($pdf = $request->file('document')){
            if(file_exists($oldFile)){
                @unlink($oldFile);
            }
            $fileName = rand(10000, 99999) . 'legal_affilation.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('images/legal_affilation/'), $fileName);
        }

        else{
            $fileName = $files->document;
        }


        $legal_affilation = [
            'title' => $request->title,
            'document' => $fileName
        ];

        DB::table('legal_affilation')->where('id',$id)->update($legal_affilation);
        return redirect()->back()->with('success', 'Successfully Updated Origin and Legal Affilation PDF');
    }
}
