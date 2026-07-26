<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class missionController extends Controller
{
    //__Create__//
    public function create(){
        $mission = DB::table('mission_vision')->first();
        return view('admin.mission.create',compact('mission'));
    }

    //__Edit__//
    public function edit(){
        $mission = DB::table('mission_vision')->first();
        return view('admin.mission.create',compact('mission'));
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
            'vision'           => 'required',
            'mission'          => 'required',
            'core_values'      => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data            = [];
        $data['vision']  = $request->vision;
        $data['mission'] = $request->mission;
        $data['core_values'] = $request->filled('core_values') ? $request->core_values : null;

        $existing = DB::table('mission_vision')->first();
        $backgroundImageName = $existing->background_image ?? null;

        if ($request->boolean('remove_background_image') && !empty($backgroundImageName)) {
            $oldPath = public_path('images/mission_vision/'.$backgroundImageName);
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
            $backgroundImageName = null;
        }

        if ($image = $request->file('background_image')) {
             if (!empty($backgroundImageName)) {
                $oldPath = public_path('images/mission_vision/'.$backgroundImageName);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }
            $backgroundImageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/mission_vision'), $backgroundImageName);
        }
        $data['background_image'] = $backgroundImageName;

        $check = DB::table('mission_vision')->first();
        if($check){
             DB::table('mission_vision')->where('id', $check->id)->update($data);
             $notification = array(
                'message' => 'Mission Vision Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            DB::table('mission_vision')->insert($data);
             $notification = array(
                'message' => 'Mission Vision Inserted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
