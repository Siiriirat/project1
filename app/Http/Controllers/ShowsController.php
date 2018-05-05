<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appoint;
use DB;
use Auth;
use App\User;


class ShowsController extends Controller
{
    public function show(Request $request)
    {
    	$NUM_PAGE = 6;
    	$page = $request->input('page');
        $page = ($page != null)?$page:1;
    	$show = Appoint::where('user_id',Auth::user()->id)->orderBy('status','asc')
                                                          ->orderby('staff','asc')
                           								  ->orderBy('date','desc')
                                                          ->orderBy('time','desc')
                                                          ->paginate($NUM_PAGE);                                               
    	return view('appoint.index_1')->with('show',$show)
    								  ->with('page',$page)
                                      ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function show_alluser(Request $request)
    {
        $amount  = Appoint::select('user_id', DB::raw('count(user_id) as cnt')) 
                                                    ->groupBy('user_id')
                                                    ->orderBy('cnt','DESC')
                                                    ->get();
        $users = DB::table('users')->get();
        return view('appoint.show_alluser')->with('users',$users)
                                           ->with('amount',$amount);
    }
    public function showProfile(Request $request)
    {
        $amount  = Appoint::select('user_id', DB::raw('count(user_id) as cnt')) 
                                                    ->groupBy('user_id')
                                                    ->orderBy('cnt','DESC')
                                                    ->get();
        $user = User::findOrFail(Auth::id());
        return view('appoint.show_profile')->with('user',$user)
                                           ->with('amount',$amount);                                
    }
    public function delete($id)
    {
        Appoint::destroy($id);
        return back();
    }
    
}
