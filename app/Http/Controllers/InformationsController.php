<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Information;
class InformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)    {
        $NUM_PAGE = 4;

        $informations = Information::orderBy('updated_at','desc')
                                   ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('appoint.index_info')->with('informations',$informations)
                                         ->with('page',$page)
                                         ->with('NUM_PAGE',$NUM_PAGE);
        
    }
    public function create()    {
        return view('appoint.create_info');
    }
    public function store(Request $request)    {
        
        Information::create( $request->all() );
        $information = Information::all()->last();
        if($request->hasFile('img_info')){
            echo 'Uploaded <br>';
            $file = $request->file('img_info');
            $fileName = md5(($file->getClientOriginalName(). time()) . time()) . "_o." . $file->getClientOriginalExtension();
            $file->move('uploads/images/news', $fileName);
            $path = 'uploads/images/news/'.$fileName;
            echo '<a href="'.$path.'" target="_blank">ดาวน์โหลดรูปภาพ</a>';
            $created_information = Information::findOrFail($information->id_info);
            $created_information->update(array('picture_info'=>$fileName));
            
        }
        else
        {
              echo 'Can not Upload';
        }
       
        return redirect('infos');
    }
    public function show($id)
    {
        $information = Information::findOrFail($id);
        return view('appoint.show_info')->with('information',$information);
    }
    public function edit($id)
    {
        $information = Information::findOrFail($id);
        return view('appoint.edit_info')->with('information',$information)
                                        ->with('id',$id);
    }
    public function update(Request $request, $id)
    {
        
        $information = Information::findOrFail($id);  
        if ($request->hasFile('img_info'))
        {
            $file = $request->file('img_info');
            $fileName = md5(($file->getClientOriginalName(). time()) . time()) . "_o." . $file->getClientOriginalExtension();
            $file->move('uploads/images/news', $fileName);
            $path = 'uploads/images/news/'.$fileName;
            echo '<a href="'.$path.'" target="_blank">ดาวน์โหลดรูปภาพ</a>';
            $created_information = Information::findOrFail($information->id_info);
            $created_information->update(array('picture_info'=>$fileName));                     
        }   
        $information->update($request->all());    
        return redirect('infos');
    }
    public function destroy($id)
    {
        Information::destroy($id);
        return redirect('infos');
    }
    public function show_1(Request $request)
    {  
        $NUM_PAGE = 3;
        $informations = Information::where('type_info',"ข่าวสารทางร้าน")
                                    ->orderBy('updated_at','desc')
                                    ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('appoint.index_info1')->with('informations',$informations)
                                    ->with('page',$page)
                                    ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function show_2(Request $request)
    {
        $NUM_PAGE = 3;
        $informations = Information::where('type_info',"ข่าวสารทั่วไป")
                                    ->orderBy('updated_at','desc')
                                    ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('appoint.index_info2')  ->with('informations',$informations)
                                            ->with('page',$page)
                                            ->with('NUM_PAGE',$NUM_PAGE);
    }
}
