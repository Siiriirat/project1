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
        $services = Service::orderBy('updated_at','asc')->get();
        return view('appoint.index_ser')->with('services',$services);
    }
    public function create()    {
        return view('appoint.service');
    }
    public function store(Request $request)    {
        
        Service::create( $request->all() );
        $service = Service::all()->last();
        return redirect('services');
    }
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('appoint.show_ser')->with('service',$service);
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
        $service->update($request->all());
        return redirect('services');
    }
    public function destroy($id)
    {
        Service::destroy($id);
        return redirect('services');
    }
}
