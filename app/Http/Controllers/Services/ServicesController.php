<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class ServicesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(Request $request)    {
        $services = Service::orderBy('id_ser','asc')->get();
        return view('appoint.index_ser')->with('services',$services);
    }
    public function create()    {
        return view('appoint.service');
    }
    public function store(Request $request)    {
        
        Service::create( $request->all() );
        $service = Service::all()->last();
        if($request->hasFile('img')){
            echo 'Uploaded <br>';
            $file = $request->file('img');
             $fileName = md5(($file->getClientOriginalName(). time()) . time()) . "_o." . $file->getClientOriginalExtension();
            $file->move('uploads/images/service', $fileName);
            $path = 'uploads/images/service/'.$fileName;
            echo '<a href="'.$path.'" target="_blank">ดาวน์โหลดรูปภาพ</a>';
            $created_service = Service::findOrFail($service->id_ser);
            $created_service->update(array('picture'=>$fileName));
            
        }
        else
        {
              echo 'Can not Upload';
        }
       
        return redirect('services');
    }
    public function show($id)
    {
        $service = Service::findOrFail($id);
        $spser = explode('.', $service->sp_time);
        $cser1 = (int) $spser[0];
        $cser2 = (int) $spser[1];

        return view('appoint.show_ser')->with('service',$service)
                                       ->with('hour',$cser1)
                                       ->with('min',$cser2);
    }
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('appoint.edit_ser')->with('service',$service)
                                       ->with('id',$id);
    }
    public function update(Request $request, $id)
    {
         
        $service = Service::findOrFail($id);  
        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $fileName = md5(($file->getClientOriginalName(). time()) . time()) . "_o." . $file->getClientOriginalExtension();
            $file->move('uploads/images/service', $fileName);
             $path = 'uploads/images/service/'.$fileName;
            echo '<a href="'.$path.'" target="_blank">ดาวน์โหลดรูปภาพ</a>';
            $created_service = Service::findOrFail($service->id_ser);
            $created_service->update(array('picture'=>$fileName));                     
        }   
        $service->update($request->all());    
        return redirect('services');
    }
    public function destroy($id)
    {
        Service::destroy($id);
        return redirect('services');
    }
}
