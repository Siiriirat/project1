<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appoint;
use DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$name = $request->get('name');
    	$NUM_PAGE = 4;
        $id_user = DB::table('users')->where('name',$name)->value('id');

        $appoints = Appoint::where('user_id',$id_user)->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
    	return view('appoint.index')->with('appoints',$appoints)
    	                            ->with('page',$page)
                                    ->with('NUM_PAGE',$NUM_PAGE);
    }
}
