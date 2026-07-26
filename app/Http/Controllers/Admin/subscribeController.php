<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class subscribeController extends Controller
{
    // index
    public function index(){
        $subscribe = DB::table('subscribe')->get();
        return view('admin.subscribe.all',compact('subscribe'));
    }

    public function destroy($id){
        DB::table('subscribe')->where('id',$id)
                              ->delete();
        return redirect()->back()->with('success','Successfully Deleted Subscription');
    }

}
