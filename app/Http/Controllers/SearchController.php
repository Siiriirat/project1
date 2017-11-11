<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appoint;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$name = $request->get('name');
    	$NUM_PAGE = 4;
        $appoints = Appoint::where('staff',$name)->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
    	return view('appoint.index')->with('appoints',$appoints)
    	                            ->with('page',$page)
                                    ->with('NUM_PAGE',$NUM_PAGE);
    }
}
