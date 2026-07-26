<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class applicationController extends Controller
{
    public function create(){
        $application = DB::table('applications')->first();
        return view('admin.application.add',compact('application'));
    }

    public function store(Request $request)
    {
        $application = DB::table('applications')->first();

        //main logo
        if($main_logo = $request->file('main_logo'))
        {
            $request->validate([
                'main_logo' => ['mimes:jpeg,png,jpg', 'max:5120'],
            ]);

            if(!empty($application) && file_exists(public_path('images/application/' . $application->main_logo)))
            {
                @unlink(public_path('images/application/' . $application->main_logo));
            }
            $main_logo_path = public_path('images/application/');
            $main_logo_name = rand(100000, 999999)."main_logo." . $main_logo->getClientOriginalExtension();
            $main_logo->move($main_logo_path, $main_logo_name);
            $main_logo_path_name = $main_logo_name;
        }
        else
        {
            if(!empty($application) && isset($application->main_logo))
            {
                $main_logo_path_name = $application->main_logo;
            }
            else
            {
                $main_logo_path_name = '';
            }

        }

        //fav icon
        if($fev_icon = $request->file('fev_icon'))
        {
            $request->validate([
                'fev_icon' => ['mimes:jpeg,png,jpg', 'max:5120'],
            ]);

            if(!empty($application) && file_exists(public_path('images/application/' . $application->fav_icon)))
            {
                @unlink(public_path('images/application/' . $application->fav_icon));
            }
            $fev_icon_path = public_path('images/application/');
            $fev_icon_name= rand(100000, 999999)."fev_icon." . $fev_icon->getClientOriginalExtension();
            $fev_icon->move($fev_icon_path, $fev_icon_name);
            $fev_icon_path_name = $fev_icon_name;
        }
        else
        {
            if(!empty($application) && isset($application->fav_icon))
            {
                $fev_icon_path_name = $application->fav_icon;
            }
            else
            {
                $fev_icon_path_name = '';
            }

        }

        $matchThese = ['id' => 1];
        DB::table('applications')->updateOrInsert($matchThese,[
            'main_logo' => $main_logo_path_name,
            'fav_icon' => $fev_icon_path_name,
            'site_name' => $request->site_name,
            'footer_text' => $request->footer_text,
            'copyright_text' => $request->copyright_text,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'facebook' => $request->fb,
            'twitter' => $request->twitter,
            'instagram' => $request->insta,
            'youtube' => $request->youtube,
        ]);

        return redirect()->back()->with('success','Successfully Inserted Data');
    }

    

    // public function store(Request $request ){
    //     $validatedData = $request->validate([
    //         'logo' => 'required|mimes:jpg,png,jpeg,gif',
    //         'fav' => 'required|mimes:jpg,png,jpeg,gif',
    //         'fb' => 'required',
    //         'twitter' => 'required',
    //         'insta' => 'required',
    //         'youtube' => 'required',
    //     ]);

    //     $logo = '';
    //     if ($image = $request->file('logo')) {
    //         $logo = rand(10000, 99999) . "logo." . $image->getClientOriginalExtension();
    //         $image->move(public_path('images/application/'), $logo);
    //     }

    //     $favicon = '';
    //     if ($image = $request->file('fav')) {
    //         $favicon = rand(10000, 99999) . "fav." . $image->getClientOriginalExtension();
    //         $image->move(public_path('images/application/'), $favicon);
    //     }

    // $application =[
    //     'main_logo' => $logo,
    //     'fav_icon' => $favicon,
    //     'facebook' => $request->fb,
    //     'twitter' => $request->twitter,
    //     'instagram' => $request->insta,
    //     'youtube' => $request->youtube
    // ];

    // DB::table('applications')->insert($application);
    // return redirect()->back()->with('success', 'Successfully inserted data');

    // }

    // index
    public function index()
    {
        $applications = DB::table('applications')->get();
        return view('admin.application.index', compact('applications'));
    }

    // edit
    public function edit($id)
    {
        $application = DB::table('applications')->where('id', $id)->first();
        return view('admin.application.edit', compact('application'));
    }

    // update
    public function update(Request $request, $id)
    {
        $application = DB::table('applications')->where('id', $id)->first();

        //main logo
        if($main_logo = $request->file('main_logo'))
        {
            $request->validate([
                'main_logo' => ['mimes:jpeg,png,jpg', 'max:5120'],
            ]);

            if(!empty($application) && file_exists(public_path('images/application/' . $application->main_logo)))
            {
                @unlink(public_path('images/application/' . $application->main_logo));
            }
            $main_logo_path = public_path('images/application/');
            $main_logo_name = rand(100000, 999999)."main_logo." . $main_logo->getClientOriginalExtension();
            $main_logo->move($main_logo_path, $main_logo_name);
            $main_logo_path_name = $main_logo_name;
        }
        else
        {
            if(!empty($application) && isset($application->main_logo))
            {
                $main_logo_path_name = $application->main_logo;
            }
            else
            {
                $main_logo_path_name = '';
            }
        }

        //fav icon
        if($fev_icon = $request->file('fev_icon'))
        {
            $request->validate([
                'fev_icon' => ['mimes:jpeg,png,jpg', 'max:5120'],
            ]);

            if(!empty($application) && file_exists(public_path('images/application/' . $application->fav_icon)))
            {
                @unlink(public_path('images/application/' . $application->fav_icon));
            }
            $fev_icon_path = public_path('images/application/');
            $fev_icon_name= rand(100000, 999999)."fev_icon." . $fev_icon->getClientOriginalExtension();
            $fev_icon->move($fev_icon_path, $fev_icon_name);
            $fev_icon_path_name = $fev_icon_name;
        }
        else
        {
            if(!empty($application) && isset($application->fav_icon))
            {
                $fev_icon_path_name = $application->fav_icon;
            }
            else
            {
                $fev_icon_path_name = '';
            }
        }

        DB::table('applications')->where('id', $id)->update([
            'main_logo' => $main_logo_path_name,
            'fav_icon' => $fev_icon_path_name,
            'site_name' => $request->site_name,
            'footer_text' => $request->footer_text,
            'copyright_text' => $request->copyright_text,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'facebook' => $request->fb,
            'twitter' => $request->twitter,
            'instagram' => $request->insta,
            'youtube' => $request->youtube,
        ]);

        return redirect()->back()->with('success','Successfully Updated Data');
    }

    // destroy
    public function destroy($id)
    {
        $application = DB::table('applications')->where('id', $id)->first();
        
        if(!empty($application)) {
            if(!empty($application->main_logo) && file_exists(public_path('images/application/' . $application->main_logo)))
            {
                @unlink(public_path('images/application/' . $application->main_logo));
            }
            if(!empty($application->fav_icon) && file_exists(public_path('images/application/' . $application->fav_icon)))
            {
                @unlink(public_path('images/application/' . $application->fav_icon));
            }
            
            DB::table('applications')->where('id', $id)->update([
                'main_logo' => null,
                'fav_icon' => null,
            ]);
        }

        return redirect()->back()->with('success','Successfully Deleted Data');
    }
}
