<?php
namespace App\Http\Controllers\Appoints;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appoint;
use DB;

class AppointsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index(Request $request)    {
        $NUM_PAGE = 4;
        $appoints = Appoint::orderBy('updated_at','desc')->paginate($NUM_PAGE);
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