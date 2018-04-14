<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appoint;
use DB;
use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    //
    public function edit($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        return View('appoint.edit_profile')->with('user', $user);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
       

        return view('appoint.show_profile')->with('user',$user);
    }
    public function changestatus(Request $request)
    {
        foreach(DB::table('users')->get() as $item)
        {
            if($item->level=="user"&&$request->get('status_checkbox'.$item->id)!=null)
            {

                $appoint = User::findOrFail($item->id);
                $appoint->update([
                        'level' => "admin",
                        ]);
            }
            else if($item->level=="admin"&&$request->get('status_checkbox'.$item->id)==null)
            {

                $appoint = User::findOrFail($item->id);
                $appoint->update([
                        'level' => "user",
                        ]);
            }

        }
            return back();      
    }
}
