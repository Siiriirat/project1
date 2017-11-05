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
           
        $time_e =$request->get('time_e');
        $idser  = (int) $request->get('id_ser');
        $nser = DB::table('services')->where('id_ser',$idser)->get();
        
        $ntime = $request->get('time');
        $sptime = explode(':', $ntime);
        
        $ctime1 = (int) $sptime[0];
        $ctime2 = (int) $sptime[1];

        $spser = explode('.', $nser[0]->sp_time);
        $cser1 = (int) $spser[0];
        $cser2 = (int) $spser[1];
        $timee_h = $ctime1 + $cser1;
        $timee_m = $ctime2 + $cser2;
        
        if($timee_m >= 60)
        {
            $m1 = $timee_m/60;
            $cm1 = (int) $m1;
           
            $m2 = $timee_m%60;
            
            $timee_h1 = $timee_h + $cm1;
            $timee_m = 0;
            $timee_m1 = $timee_m + $m2;
            
            if($timee_m1 <= 9)
            {
              $t1 = (string) $timee_h1;
              $t2 = (string) $timee_m1;
              $t3 = '0'.$t2;
              $t4 = $t1.':'.$t3;
              $time_e = $t4;
              
            }
            elseif($timee_m1 > 9)
            {
              $t1 = (string) $timee_h1;
              $t2 = (string) $timee_m1;
              $t3 = $t1.':'.$t2 ;
              $time_e = $t3;
              
            }
        }
        elseif ($timee_m < 60) {
            
            $t3 = (string) $timee_h;
            $t4 = (string) $timee_m;
            $t5 = $t3.':'.$t4 ;
            $time_e = $t5;
           
        }
        //dd($time_e);
        $finds = DB::table('appoints')->get();

        foreach ($finds as $find) {
          $sp_find_b = explode(':', $find->time);
          $c_sp_find_b = ((int)  $sp_find_b[0] * 60) + (int)  $sp_find_b[1];
          $sp_find_e = explode(':', $find->time_e);
          $c_sp_find_e = ((int)  $sp_find_e[0] * 60) + (int)  $sp_find_e[1];
          // dd($c_sp_find_e);

          $timeh = $request->get('time');
          $sp_time = explode(':', $timeh);
          $date = $request->get('date');
          //dd($find->date);


          
          //เวลาเริ่มต้นที่รับเข้าา
          $c_sp_time0 = ((int)  $sp_time[0] * 60) + (int)  $sp_time[1];
        
          $sp_time1 = explode(':', $time_e);
          
          //เวลาสิ้นสุดที่คำนวณค่าจากตอบรับแล้ว
          $c_sp_time1 = ((int)  $sp_time1[0] * 60) + (int)  $sp_time1[1];

           
          //$cser2 = (int) $spser[1];
          // dd($)
          // dd($find->time_e);
          $count =0;
           
          if( (($c_sp_find_b<=$c_sp_time0   &&   $c_sp_find_e >= $c_sp_time0)||
            ($c_sp_find_b<=$c_sp_time1   &&   $c_sp_find_e >= $c_sp_time1))&&
            ($request->get('date')==$find->date)&&
            ($request->get('staff')==$find->staff))
          {
            

            // $count++;
            // dd($count);
            // return redirect('appoint')->with('errors','วันที่ '.$request->date.' เวลา '.$request->time.' มีคนจองแล้วค่ะ '. 'กรุณากรอกข้อมูลใหม่');
            
            return redirect('appoint')->with('errors','วันที่ '.$request->date.' เวลา '.$request->time.' มีคนจองแล้วค่ะ '. 'กรุณากรอกข้อมูลใหม่');
          }
          // dd($find->time);
        }
          // $count = 0;
            // dd($count);

        $data = new Appoint;
        $data->time_e = $time_e;
        //dd($data->time_e);
        $data->tel = $request->get('tel');
        $data->gender = $request->get('gender');
        $data->date = $request->get('date');
        $data->time = $request->get('time');
        $data->staff = $request->get('staff');
        $data->detail = $request->get('detail');
        $data->user_id = $request->get('user_id');
        $data->id_ser = $request->get('id_ser');
        $data->ip = $request->get('ip');
        $data->save();

        return redirect('appoints')->with('time_e',$data->time_e);
        
        // $temp_app = DB::table('appoints')->where('date',$request->date)
        //                                  ->where('time',$request->time)
        //                                  ->where('staff',$request->staff)->get();
        
        // //dd($te);
                                 
        // if(count($temp_app)==0)
        // {
        // /*Appoint::create( $request->all() );
        // $appoint = Appoint::all()->last();*/
        // $data = new Appoint;
        // $data->time_e = $time_e;
        // $data->tel = $request->get('tel');
        // $data->gender = $request->get('gender');
        // $data->date = $request->get('date');
        // $data->time = $request->get('time');
        // $data->staff = $request->get('staff');
        // $data->detail = $request->get('detail');
        // $data->user_id = $request->get('user_id');
        // $data->id_ser = $request->get('id_ser');
        // $data->ip = $request->get('ip');
        // $data->save();
        // return redirect('appoints')->with('time_e',$data->time_e);
        // }
        // else
        // {
        // return redirect('appoint')->with('errors','วันที่ '.$request->date.' เวลา '.$request->time.' มีคนจองแล้วค่ะ '. 'กรุณากรอกข้อมูลใหม่');
        // }

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