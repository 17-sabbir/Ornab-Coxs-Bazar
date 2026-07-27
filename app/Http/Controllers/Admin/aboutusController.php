<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class aboutusController extends Controller
{
    //__Create__//
    public function create(){
        $about = DB::table('about_us')->first();
        return view('admin.about.add',compact('about'));
    }

    //__Edit__//
    public function edit(){
        $about = DB::table('about_us')->first();
        return view('admin.about.add',compact('about'));
    }

    //__Store__//
    public function store(Request $request){
        return $this->save($request);
    }

    //__Update__//
    public function update(Request $request){
        return $this->save($request);
    }

    //__Save (shared by store/update)__//
    protected function save(Request $request){
        $request->validate([
            'about_us'        => 'nullable',
            'philosophy'      => 'nullable|string',
            'core_values'      => 'nullable|string',
            'vision'          => 'nullable',
            'mission'         => 'nullable',
            'our_story'       => 'nullable',
            'about_image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'vision_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'mission_image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'story_image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $data = $request->only([
            'about_us', 'philosophy', 'core_values',
            'vision', 'mission', 'our_story',
        ]);

        $existing = DB::table('about_us')->first();

        // Handle image uploads
        $imageFields = ['about_image', 'vision_image', 'mission_image', 'story_image'];
        foreach ($imageFields as $field) {
            if ($image = $request->file($field)) {
                // Delete old image
                if ($existing && $existing->$field) {
                    $oldPath = public_path('images/about_us/' . $existing->$field);
                    if (file_exists($oldPath)) @unlink($oldPath);
                }
                $name = hexdec(uniqid()) . '_' . $field . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/about_us'), $name);
                $data[$field] = $name;
            }
        }

        $matchThese = ['id' => 1];
        DB::table('about_us')->updateOrInsert($matchThese, $data);

        return redirect()->back()->with('success', 'About Us updated successfully.');
    }
}
