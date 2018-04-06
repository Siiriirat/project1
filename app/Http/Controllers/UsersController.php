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
}
