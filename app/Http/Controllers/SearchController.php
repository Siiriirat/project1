<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appoint;
use DB;
use App\Service;
use Auth;
use DateTime;

class SearchController extends Controller
{
    public function income(Request $request)
    {
        $total=0;
    	$date = $request->get('date');
        $appoints = Appoint::where('date',$date)->select(DB::raw('count(*) as appointscount, id_ser'))->groupBy('id_ser')->get();
        $service  = Service::all();
        
        foreach ($appoints as  $a) {
            $services = Service::where('id_ser',$a->id_ser)->select('cost')->get();
            foreach($services as $s){
                $total+=$s->cost;
            }
        }
        if($total != 0){
            return view('appoint.income')->with('appoints',$appoints)
                                         ->with('service',$service)
                                         ->with('date',$date)
                                         ->with('total',$total);
        }
        else if($total == 0){
            return back()->with('errors','วันที่ '.$request->date.' ไม่มีผู้ใช้บริการ ')->withInput($request->input());
        }
	
    }
    public function income_show(Request $request)
    {
        $total=0;
        $timezone = new DateTime('Asia/Bangkok');
        $date = $timezone->format('d-m-Y');
        $service  = Service::all();
        $appoints = Appoint::where('date',$date)->select(DB::raw('count(*) as appointscount, id_ser'))->groupBy('id_ser')->get();
        foreach ($appoints as  $a) {
            $services = Service::where('id_ser',$a->id_ser)->select('cost')->get();
            foreach($services as $s){
                $total+=$s->cost;
            }
        }
        if($total != 0){
            return view('appoint.income')->with('appoints',$appoints)
                                     ->with('service',$service)
                                     ->with('date',$date)
                                     ->with('total',$total);
        }
        else if($total == 0){
            return back()->with('errors','วันที่ '.$request->date.' ไม่มีผู้ใช้บริการ ')->withInput($request->input());
        }
        
    
    }
   



}
