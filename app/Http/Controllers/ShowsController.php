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
                           								  ->orderBy('date','desc')
                                                          ->orderBy('time','desc')
                                                          ->paginate($NUM_PAGE);
    	return view('appoint.index_1')->with('show',$show)
    								  ->with('page',$page)
                                      ->with('NUM_PAGE',$NUM_PAGE);
    }
}
