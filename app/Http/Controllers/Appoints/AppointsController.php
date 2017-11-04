<?php
namespace App\Http\Controllers\Appoints;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appoint;
use DB;
use App\Service;

class AppointsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index(Request $request)    {
        $NUM_PAGE = 4;
        $appoints = Appoint::orderBy('staff','asc')
                           ->orderBy('time','asc')
                           ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('appoint.index')->with('appoints',$appoints)
                                    ->with('page',$page)
                                    ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function create()    {
        return view('appoint.appoint');
    }
    public function store(Request $request)    {
        //$ntime = (int) $request->get('time');
        $idser  = (int) $request->get('id_ser');
        $nser = DB::table('services')->where('id_ser',$idser)->get();
    
        $ntime = $request->get('time');
        $sptime = explode(':', $ntime);
        //dd($sptime[0]);
        $ctime1 = (int) $sptime[0];
        $ctime2 = (int) $sptime[1];
        $sum = $ctime2 + 2;
        //dd($ctime2);
        //$ntime = $request->get('time');
        //dd($nser[0]->sp_time);

        $spser = explode('.', $nser[0]->sp_time);
        $cser1 = (int) $spser[0];
        $cser2 = (int) $spser[1];
        $timee_h = $ctime1 + $cser1;
        $timee_m = $ctime2 + $cser2;
        //dd($timee_m);
        //dd($ctime1);
        //dd($timee_h);
        if($timee_m >= 60)
        {
            $m1 = $timee_m/60;
            $cm1 = (int) $m1;
            // dd($cm1);
            $m2 = $timee_m%60;
            //dd($m2);
            $timee_h1 = $timee_h + $cm1;
            $timee_m = 0;
            $timee_m1 = $timee_m + $m2;
            //dd($timee_h1);
            if($timee_m1 <= 9)
            {
              $t1 = (string) $timee_h1;
              $t2 = (string) $timee_m1;
              $t3 = '0'.$t2;
              $t4 = $t1.':'.$t3;
              dd($t4);  
            }
            elseif($timee_m1 > 9)
            {
              $t1 = (string) $timee_h1;
              $t2 = (string) $timee_m1;
              $t3 = $t1.':'.$t2 ;
              dd($t3);  
            }
        }
        elseif ($timee_m < 60) {
            //$b1 = $timee_m + 
            //dd($timee_h);
            //dd($timee_m);
            $t3 = (string) $timee_h;
            $t4 = (string) $timee_m;
            $t5 = $t3.':'.$t4 ;
            dd($t5);
        }

        $temp_app = DB::table('appoints')->where('date',$request->date)
                                         ->where('time',$request->time)
                                         ->where('staff',$request->staff)->get();
        if(count($temp_app)==0)
        {
        Appoint::create( $request->all() );
        $appoint = Appoint::all()->last();
        return redirect('appoints');
        }
        else
        {
        return redirect('appoint')->with('errors','วันที่ '.$request->date.' เวลา '.$request->time.' มีคนจองแล้วค่ะ '. 'กรุณากรอกข้อมูลใหม่');
        }

    }
    public function show($id)
    {
        $appoint = Appoint::findOrFail($id);
        return view('appoint.show')->with('appoint',$appoint);
    }
    public function edit($id)
    {
        $appoint = Appoint::findOrFail($id);
        return view('appoint.edit')->with('appoint',$appoint)
                                   ->with('id',$id);
    }
    public function update(Request $request, $id)
    {
        $appoint = Appoint::findOrFail($id);      
        $appoint->update($request->all());
        return redirect('appoints');
    }
    public function destroy($id)
    {
        Appoint::destroy($id);
        return redirect('appoints');
    }
    

}