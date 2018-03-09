<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appoint;
use DB;
use Auth;

class ShowsController extends Controller
{
    public function show(Request $request)
    {
    	$NUM_PAGE = 8;
    	$page = $request->input('page');
        $page = ($page != null)?$page:1;
    	$show = Appoint::where('user_id',Auth::user()->id)->orderby('staff','asc')
    													  ->orderBy('created_at','desc')
                           								  ->orderBy('date','desc')
                                                          ->orderBy('time','desc')
                                                          ->paginate($NUM_PAGE);
                                                        
    	return view('appoint.index_1')->with('show',$show)
    								  ->with('page',$page)
                                      ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function show_1(Request $request)
    {
        $NUM_PAGE = 6;
        $appoints = Appoint::where('staff',"B")->orderBy('staff','asc')
                                               ->orderBy('created_at','desc')
                                               ->orderBy('time','asc')
                                               ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        $services = DB::table('services')->get();
        return view('appoint.appoints_1')->with('appoints',$appoints)
                                    ->with('page',$page)
                                    ->with('services',$services)
                                    ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function show_2(Request $request)
    {
        $NUM_PAGE = 6;
        $appoints = Appoint::where('staff',"C")->orderBy('staff','asc')
                                               ->orderBy('created_at','desc')
                                               ->orderBy('time','asc')
                                               ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        $services = DB::table('services')->get();
        return view('appoint.appoints_2')->with('appoints',$appoints)
                                         ->with('page',$page)
                                         ->with('services',$services)
                                         ->with('NUM_PAGE',$NUM_PAGE);
    }
    
    public function show_alluser(Request $request)
    {
        $amount  = Appoint::select('user_id', DB::raw('count(user_id) as cnt')) 
                                                    ->groupBy('user_id')
                                                    ->orderBy('cnt','DESC')
                                                    ->get();
        // dd($amount);

        $users = DB::table('users')->get();
        
        return view('appoint.show_alluser')->with('users',$users)
                                           ->with('amount',$amount);
    }


    public function delete($id)
    {
        Appoint::destroy($id);
        return back();
    }
}
