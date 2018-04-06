<?php
namespace App\Http\Controllers\Auth;
 
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class UpdatePasswordController extends Controller
{
    /*
     * Ensure the user is signed in to access this page
     */
    public function __construct() {
 
        $this->middleware('auth');
 
    }
 
    /**
     * Update the password for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
 
        $user = User::findOrFail(Auth::id());
        $hashedPassword = $user->password;


        if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
            $request->session()->flash('success', 'Your password has been changed.');
            return back();
        }
        $request->session()->flash('failure', 'Your password has not been changed.');
        return back();
    }
    public function updateProfile(Request $request)
    {
        // dd($request->get('status_user'));
        $users = User::findOrFail(Auth::id());  
        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $fileName = md5(($file->getClientOriginalName(). time()) . time()) . "_o." . $file->getClientOriginalExtension();
            $file->move('uploads/images/user', $fileName);
             $path = 'uploads/images/user/'.$fileName;
            echo '<a href="'.$path.'" target="_blank">ดาวน์โหลดรูปภาพ</a>';
            $created_user = User::findOrFail($users ->id);
            $created_user->update(array('picture_user'=>$fileName));                     
        }   
        if($users->level =="admin"){
        $users->name =  $request->get('name'); 
        $users->level =  $request->get('level'); 

        $users->status_user =  $request->get('status_user');  
        $users->save();
        }
        elseif($users->level =="user"){
        $users->name =  $request->get('name'); 
        $users->level = "user"; 

        $users->status_user =  "absent";  
        $users->save();
        }
        
        return back();
    }
}