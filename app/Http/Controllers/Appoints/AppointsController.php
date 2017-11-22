<?php
namespace App\Http\Controllers\Appoints;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appoint;
use DB;
use App\Service;
use App\User;

class AppointsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index(Request $request)    {
        $NUM_PAGE = 8;
        $appoints = Appoint::orderBy('staff','asc')
                           ->orderBy('date','desc')
                           ->orderBy('time','desc')
                           ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('appoint.index')->with('appoints',$appoints)
                                    ->with('page',$page)
                                    ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function index1(Request $request)    {
        $NUM_PAGE = 8;
        $appoints = Appoint::orderBy('staff','asc')
                           ->orderBy('date','desc')
                           ->orderBy('time','desc')
                           ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('appoint.index_1')->with('appoints',$appoints)
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
        // dd($nser[0]->name_ser);
        $ntime = $request->get('time');
        $sptime = explode(':', $ntime);
        
        $ctime1 = (int) $sptime[0];
        $ctime2 = (int) $sptime[1];
        
        $spser = explode('.', $nser[0]->sp_time);
        $cser1 = (int) $spser[0];
        $cser2 = (int) $spser[1];
        $timee_h = $ctime1 + $cser1;
        $timee_m = $ctime2 + $cser2;
        if ($timee_m >= 60 && $timee_h >=24) 
        {
            $m1 = $timee_m/60;
            $cm1 = (int) $m1;
            $m2 = $timee_m%60;
            $timee_h1 = 0 + ((int)($timee_h + $cm1)%24);
            $timee_m1 = 0 + $m2;
            if($timee_m1 <= 9 && $timee_h1 <= 9)
            {   
              $time_e = ('0'.(string) $timee_h1).':'.'0'. (string) $timee_m1;
            }
            elseif($timee_m1 <= 9 && $timee_h1 >= 9)
            { 
              $time_e = (string) $timee_h1.':'.'0'.(string) $timee_m1;
            }
            elseif($timee_m1 >= 9 && $timee_h1 <= 9)
            { 
              $time_e = '0'.(string) $timee_h1.':'.(string) $timee_m1;
            }  
        }
        elseif($timee_m >= 60 && $timee_h < 24)
        {
            $m1 = $timee_m/60;
            $cm1 = (int) $m1;
            $m2 = $timee_m%60;
            $timee_h1 = $timee_h + $cm1;
            $timee_m = 0;
            $timee_m1 = $timee_m + $m2;
            if($timee_m1 <= 9 && $timee_h1 <= 9)
            {   
              $time_e = ('0'.(string) $timee_h1).':'.'0'. (string) $timee_m1; 
            }
            elseif($timee_m1 <= 9 && $timee_h1 >= 9)
            { 
              $time_e = (string) $timee_h1.':'.'0'.(string) $timee_m1;
            }
            elseif($timee_m1 >= 9 && $timee_h1 <= 9)
            { 
              $time_e = '0'.(string) $timee_h1.':'.(string) $timee_m1;
            }
            elseif($timee_m1 >= 9 && $timee_h1 >= 9)
            { 
              $time_e = (string) $timee_h1.':'.(string) $timee_m1;
            } 
        }
        elseif ($timee_m < 60 && $timee_h >=24) 
        {
            $timee_h1 = 0 + ((int)($timee_h)%24);
            if($timee_m >= 9 && $timee_h1 <= 9)
            { 
              $time_e = '0'.(string) $timee_h1.':'.(string) $timee_m;
            }  
        }
        elseif ($timee_m < 60 && $timee_h < 24) 
        {
            if($timee_m >= 9 && $timee_h <= 9)
            { 
              $time_e = '0'.(string) $timee_h.':'.(string) $timee_m;
            }  
            elseif($timee_m >= 9 && $timee_h >= 9)
            { 
               $time_e = (string) $timee_h.':'.(string) $timee_m;
            }    
        }
        $finds = DB::table('appoints')->get();
        foreach ($finds as $find) {
          $sp_find_b = explode(':', $find->time);
          $c_sp_find_b = ((int)  $sp_find_b[0] * 60) + (int)  $sp_find_b[1];
          $sp_find_e = explode(':', $find->time_e);
          $c_sp_find_e = ((int)  $sp_find_e[0] * 60) + (int)  $sp_find_e[1];

          $timeh = $request->get('time');
          $sp_time = explode(':', $timeh);
          $date = $request->get('date');
          //เวลาเริ่มต้นที่รับเข้าา
          $c_sp_time0 = ((int)  $sp_time[0] * 60) + (int)  $sp_time[1];
          //เวลาสิ้นสุดที่คำนวณค่าจากตอบรับแล้ว
          $sp_time1 = explode(':', $time_e);
          $c_sp_time1 = ((int)  $sp_time1[0] * 60) + (int)  $sp_time1[1];       
          if( (($c_sp_find_b<=$c_sp_time0   &&   $c_sp_find_e >= $c_sp_time0)||
            ($c_sp_find_b<=$c_sp_time1   &&   $c_sp_find_e >= $c_sp_time1))&&
            ($request->get('date')==$find->date)&&
            ($request->get('staff')==$find->staff))
          { 
            return redirect('appoint')->with('errors','วันที่ '.$request->date.' เวลา '.$request->time.'-'.$find->time_e.' มีคนจองแล้วค่ะ '. 'กรุณากรอกข้อมูลใหม่');
          }
        }
        $data = new Appoint;
        $data->time_e = $time_e;
        $data->tel = $request->get('tel');
        $data->gender = $request->get('gender');
        $data->date = $request->get('date');
        $data->time = $request->get('time');
        $data->staff = $request->get('staff');
        $data->detail = $request->get('detail');
        $data->user_id = $request->get('user_id');
        $data->id_ser = $request->get('id_ser');
        $data->ip = $request->get('ip');
        $data->comment = $request->get('comment');
        $data->save();
        return redirect('appoints')->with('time_e',$data->time_e);
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
        
        $service = DB::table('services')->where('name_ser',$request->get('id_ser'))->get();
        $appoint = Appoint::findOrFail($id);  
        $time_e = $appoint->time_e;
        $ntime =  $appoint->time;
        $sptime = explode(':', $ntime);
        $ctime1 = (int) $sptime[0];
        $ctime2 = (int) $sptime[1];
        $spser = explode('.', $service[0]->sp_time);
        $cser1 = (int) $spser[0];
        $cser2 = (int) $spser[1];
        // dd($cser2);
        $timee_h = $ctime1 + $cser1;
        $timee_m = $ctime2 + $cser2;
        if ($timee_m >= 60 && $timee_h >=24) 
        {
            $m1 = $timee_m/60;
            $cm1 = (int) $m1;
            $m2 = $timee_m%60;
            $timee_h1 = 0 + ((int)($timee_h + $cm1)%24);
            $timee_m1 = 0 + $m2;
            if($timee_m1 <= 9 && $timee_h1 <= 9)
            {   
              $time_e = ('0'.(string) $timee_h1).':'.'0'. (string) $timee_m1; //dd($time_e);   
            }
            elseif($timee_m1 <= 9 && $timee_h1 >= 9)
            { 
              $time_e = (string) $timee_h1.':'.'0'.(string) $timee_m1;//dd($time_e);
            }
            elseif($timee_m1 >= 9 && $timee_h1 <= 9)
            { 
              $time_e = '0'.(string) $timee_h1.':'.(string) $timee_m1;//dd($time_e);   
            }  
        }
        elseif($timee_m >= 60 && $timee_h < 24)
        {
            $m1 = $timee_m/60;

            $cm1 = (int) $m1;
            $m2 = $timee_m%60;
            $timee_h1 = $timee_h + $cm1;
            $timee_m = 0;
            $timee_m1 = $timee_m + $m2;
            //dd($timee_m1);
            if($timee_m1 <= 9 && $timee_h1 <= 9)
            {   
              $time_e = ('0'.(string) $timee_h1).':'.'0'. (string) $timee_m1; //dd($time_e);  
            }
            elseif($timee_m1 <= 9 && $timee_h1 >= 9)
            { 
              $time_e = (string) $timee_h1.':'.'0'.(string) $timee_m1;//dd($time_e);
            }
            elseif($timee_m1 >= 9 && $timee_h1 <= 9)
            { 
              $time_e = '0'.(string) $timee_h1.':'.(string) $timee_m1; //dd($time_e);
            }
            elseif($timee_m1 >= 9 && $timee_h1 >= 9)
            { 
              $time_e = (string) $timee_h1.':'.(string) $timee_m1;//dd($time_e);
            } 
        }
        elseif ($timee_m < 60 && $timee_h >=24) 
        {

            $timee_h1 = 0 + ((int)($timee_h)%24);
            if($timee_m >= 9 && $timee_h1 <= 9)
            { 
              $time_e = '0'.(string) $timee_h1.':'.(string) $timee_m; //dd($time_e);
            }  
            // elseif($timee_m >= 9 && $timee_h1 >= 9)
            // { 
            //   $time_e = (string) $timee_h1.':'.(string) $timee_m;
            // }    
        }
        elseif ($timee_m < 60 && $timee_h < 24) 
        {

            //$timee_h1 = 0 + ((int)($timee_h)%24);
            if($timee_m >= 9 && $timee_h <= 9)
            { 
              $time_e = '0'.(string) $timee_h.':'.(string) $timee_m; //dd($time_e);
            }  
            elseif($timee_m >= 9 && $timee_h >= 9)
            { 
               $time_e = (string) $timee_h.':'.(string) $timee_m; //dd($time_e);
            }    
        }
        $finds = DB::table('appoints')->get();
        // dd($finds);
        foreach ($finds as $find) {
          $sp_find_b = explode(':', $find->time);
          // dd($sp_find_b);
          $c_sp_find_b = ((int)  $sp_find_b[0] * 60) + (int)  $sp_find_b[1];
          $sp_find_e = explode(':', $find->time_e);
          $c_sp_find_e = ((int)  $sp_find_e[0] * 60) + (int)  $sp_find_e[1];

          $timeh = $request->get('time');
          // dd($timeh);
          $sp_time = explode(':', $timeh);
          $date = $request->get('date');
          //เวลาเริ่มต้นที่รับเข้าา
          $c_sp_time0 = ((int)  $sp_time[0] * 60) + (int)  $sp_time[1];
          //เวลาสิ้นสุดที่คำนวณค่าจากตอบรับแล้ว
          $sp_time1 = explode(':', $time_e);
          //dd($sp_time1);
          $c_sp_time1 = ((int)  $sp_time1[0] * 60) + (int)  $sp_time1[1]; 
                 
          if( (($c_sp_find_b<=$c_sp_time0   &&   $c_sp_find_e >= $c_sp_time0)||
            ($c_sp_find_b<=$c_sp_time1   &&   $c_sp_find_e >= $c_sp_time1))&&
            ($request->get('date')==$find->date)&&
            ($request->get('staff')==$find->staff) && ($find->id != $appoint->id))
          { 
            return redirect('appoint')->with('errors','วันที่ '.$request->date.' เวลา '.$request->time.' - '.$find->time_e.' มีคนจองแล้วค่ะ '. 'กรุณากรอกข้อมูลใหม่');
          }
        }
        $users = DB::table('users')->where('id',$request->get('user_id'))->get();
        foreach ($users as $user){
                $level = $user->level;
                if($level == "admin")
                {
                     $appoint->update([
                        'date' => $request->get('date'),
                        'time' => $request->get('time'),
                        'time_e' => $time_e,
                        'staff' => $request->get('staff'),
                        'detail' => $request->get('detail'),
                        'id_ser' => $service[0]->id_ser,
                        'ip' => $request->get('ip'),
                        'status' => $request->get('status'),
                        'comment' =>$request->get('comment')]);
                        return redirect('appoints');
                }
                elseif($level == "user")
                {    
                     $appoint->update(['tel'=>$request->get('tel'),
                        'gender' => $request->get('gender'),
                        'date' => $request->get('date'),
                        'time' => $request->get('time'),
                        'time_e' => $time_e,
                        'staff' => $request->get('staff'),
                        'detail' => $request->get('detail'),
                        'id_ser' => $service[0]->id_ser,
                        'ip' => $request->get('ip'),
                        'status' => 0,
                        'comment' =>$request->get('comment')]); 
                        return redirect('appoints');
                }


        }
       


        // $appoint->update(['tel'=>$request->get('tel'),
        //                 'gender' => $request->get('gender'),
        //                 'date' => $request->get('date'),
        //                 'time' => $request->get('time'),
        //                 'staff' => $request->get('staff'),
        //                 'user_id' => $request->get('user_id'),
        //                 'detail' => $request->get('detail'),
        //                 'id_ser' => $service[0]->id_ser,
        //                 'ip' => $request->get('ip'),
        //                 'status' =>$request->get('status'),
        //                 'comment' =>$request->get('comment')]);
        // //dd($appoint);
        // return redirect('appoints');
    }
    public function destroy($id)
    {
        Appoint::destroy($id);
        return redirect('appoints');
    }
    

}