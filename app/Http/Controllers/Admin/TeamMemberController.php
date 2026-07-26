<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamMemberController extends Controller
{
    // add
    public function add()
    {
        return view('admin.team_members.add');
    }

    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'         => 'required',
            'designation'  => 'required',
            'photo'        => 'nullable|mimes:jpg,png,jpeg,gif,webp',
            'order'        => 'nullable|integer',
        ]);

        $photoName = '';
        if ($photo = $request->file('photo')) {
            $photoName = rand(10000, 99999) . "team." . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/team_members/'), $photoName);
        }

        $data = array(
            'name'          => $request->name,
            'designation'   => $request->designation,
            'department'    => $request->department,
            'bio'           => $request->bio,
            'description'   => $request->description,
            'photo'         => $photoName,
            'facebook'      => $request->facebook,
            'twitter'       => $request->twitter,
            'instagram'     => $request->instagram,
            'youtube'       => $request->youtube,
            'linkedin'      => $request->linkedin,
            'email'         => $request->email,
            'order'         => $request->order ?? 0,
            'status'        => $request->boolean('status'),
        );

        DB::table('team_members')->insert($data);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $data = DB::table('team_members')->orderBy('order', 'asc')->get();
        return view('admin.team_members.index', compact('data'));
    }

    // Destroy
    public function destroy($id)
    {
        $item = DB::table('team_members')->where('id', $id)->first();
        if ($item && $item->photo) {
            $oldImageName = public_path('images/team_members/' . $item->photo);
            if (is_file($oldImageName)) {
                @unlink($oldImageName);
            }
        }
        
        DB::table('team_members')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // Edit
    public function edit($id)
    {
        $data = DB::table('team_members')->where('id', $id)->first();
        return view('admin.team_members.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'         => 'required',
            'designation'  => 'required',
            'order'        => 'nullable|integer',
        ]);

        $item = DB::table('team_members')->where('id', $id)->first();

        $photoName = $item->photo;
        $oldImageName = public_path('images/team_members/' . $item->photo);

        if ($photo = $request->file('photo')) {
            if ($item->photo && is_file($oldImageName)) {
                @unlink($oldImageName);
            }
            $photoName = rand(10000, 99999) . "team." . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/team_members'), $photoName);
        }

        $data = array(
            'name'          => $request->name,
            'designation'   => $request->designation,
            'department'    => $request->department,
            'bio'           => $request->bio,
            'description'   => $request->description,
            'photo'         => $photoName,
            'facebook'      => $request->facebook,
            'twitter'       => $request->twitter,
            'instagram'     => $request->instagram,
            'youtube'       => $request->youtube,
            'linkedin'      => $request->linkedin,
            'email'         => $request->email,
            'order'         => $request->order ?? 0,
            'status'        => $request->boolean('status'),
        );

        DB::table('team_members')->where('id', $id)->update($data);
        return redirect()->back()->with('update', 'Successfully Updated');
    }
}
