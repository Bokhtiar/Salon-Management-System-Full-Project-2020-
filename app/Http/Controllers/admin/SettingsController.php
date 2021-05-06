<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Session;
use DB;


class SettingsController extends Controller
{
    public function update_profile(){
      return view('admin.setting.update_profile');
    }


    public function store_update(Request $request,$id){
      $this->validate($request,[
        'first_name'=>'required',
        'last_name'=>'required',
        'email'=>'required',

      ]);
      $user=User::find($id);
        $user['first_name']=$request->first_name;
        $user['last_name']=$request->last_name;
        $user['email']=$request->email;
      $user->save();
      Session::flash('update','Customer Updated Sucessfully...');
      return redirect('/');
    }


    public function reset_passsword(){
      return view('admin.setting.password_reset');
    }


    public function change_password(Request $request){
      $this->validate($request,[
        'old_password'=>'required',
        'password'=>'required|confirmed',
      ]);

      $hashedpassword=Auth::user()->password;
        if (Hash::check($request->old_password,$hashedpassword)) {
            if(!Hash::check($request->password,$hashedpassword)){
              $user=User::find(Auth::id());
              $user->password=Hash::make($request->password);
              $user->save();


              Auth::logout();
              return redirect()->route('login');
              Session::flash('update','Customer Added Sucessfully...');
            }
            else {
              return redirect()->route('/');
            }
        }else {
          Session::flash('reset_password','Dont matched the password plz inter your valid password...');
          return redirect('/');
        }
    }
    
    
    public function new_admin(){
        return view('admin.setting.password_reset');
    }
    
    
    
      public function store(Request $request){
          
          $this->validate($request,[
        'first_name'=>'required',
        'last_name'=>'required',
        'email'=>'required',
        'password'=>'required',
      ]);
         
             
            if (User::where('email', $request->email)->first() != null) {
                 return redirect('/')->with(Session::flash('exists',' exists Sucessfully...'));
            }
            else{
                $admin=new User;
            $admin['first_name']=$request->first_name;
            $admin['last_name']=$request->last_name;
            $admin['email']=$request->email;
            $admin['password']= Hash::make($request['password']);
            $admin->save();
                return redirect('/')->with(Session::flash('insert',' Added Sucessfully...'));
            }
                

          
    }


    public function logout(){
      Auth::logout();
      Session::flash('reset_password','Dont matched the password plz inter your valid password...');
      return redirect()->route('login');
    }



}
