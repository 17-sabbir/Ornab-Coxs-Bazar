<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class noticeController extends Controller
{
    public function add()
    {
        return view('admin.notices.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'notice_no' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'attachment' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'publish_date' => 'required|date',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(10000, 99999).'notice.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/notices/'), $imageName);
        }

        $attachmentName = '';
        if ($file = $request->file('attachment')) {
            $attachmentName = rand(10000, 99999).'notice.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/notices/'), $attachmentName);
        }

        DB::table('notices')->insert([
            'title' => $request->title,
            'notice_no' => $request->notice_no,
            'description' => $request->description,
            'attachment' => $attachmentName,
            'image' => $imageName,
            'publish_date' => $request->publish_date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Successfully inserted notice');
    }

    public function index()
    {
        $notices = DB::table('notices')->orderBy('publish_date', 'desc')->orderBy('id', 'desc')->get();

        return view('admin.notices.index', compact('notices'));
    }

    public function destroy($id)
    {
        $notice = DB::table('notices')->where('id', $id)->first();

        if ($notice->image) {
            $oldImage = public_path('images/notices/'.$notice->image);
            if (file_exists($oldImage)) {
                @unlink($oldImage);
            }
        }

        if ($notice->attachment) {
            $oldAttachment = public_path('images/notices/'.$notice->attachment);
            if (file_exists($oldAttachment)) {
                @unlink($oldAttachment);
            }
        }

        DB::table('notices')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Successfully Deleted Notice');
    }

    public function edit($id)
    {
        $notice = DB::table('notices')->where('id', $id)->first();

        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $notice = DB::table('notices')->where('id', $id)->first();

        $validated = $request->validate([
            'title' => 'required',
            'notice_no' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'attachment' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'publish_date' => 'required|date',
        ]);

        $imageName = $notice->image;
        if ($image = $request->file('image')) {
            $oldImage = public_path('images/notices/'.$notice->image);
            if ($notice->image && file_exists($oldImage)) {
                @unlink($oldImage);
            }
            $imageName = rand(10000, 99999).'notice.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/notices/'), $imageName);
        }

        $attachmentName = $notice->attachment;
        if ($file = $request->file('attachment')) {
            $oldAttachment = public_path('images/notices/'.$notice->attachment);
            if ($notice->attachment && file_exists($oldAttachment)) {
                @unlink($oldAttachment);
            }
            $attachmentName = rand(10000, 99999).'notice.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/notices/'), $attachmentName);
        }

        DB::table('notices')->where('id', $id)->update([
            'title' => $request->title,
            'notice_no' => $request->notice_no,
            'description' => $request->description,
            'attachment' => $attachmentName,
            'image' => $imageName,
            'publish_date' => $request->publish_date,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('update', 'Successfully Updated Notice');
    }
}
