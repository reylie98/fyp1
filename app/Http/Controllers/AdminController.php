<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
                    return redirect ('/admin/dashboard');
            }if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'2'])){
                return redirect ('/cs/dashboard');
            }else{
                return redirect ('/admin')->with('flash_message_error','invalid Username or Password');
            }

        }
        return view ('admin.admin_login');
    }
    public function dashboard(){
        return view ('admin.dashboard');
    }
    public function csdashboard(){
        return view ('cs.csdashboard');
    }
    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_error','Please Login use Customer Service Account');
    }
    public function logout2(){
        Session::flush();
        return redirect('/admin')->with('flash_message_error','Please Login use Admin Account');
    }
    public function logout1(){
        Session::flush();
        return redirect('/admin');
    }
    Public function settings(){
        return view ('admin.settings');
    }
    Public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['currentpwd'];
        $check_password = User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,$check_password->password))
        {
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    } 
    Public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            //echo "<pre>"; print_r($data); die;
            $check_password = User::where(['email'=> Auth::user()->email])->first();
            $current_password = $data['currentpwd'];
            if(Hash::check($current_password,$check_password->password)){
                $password=bcrypt($data['newpwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','Password Updated Successfully!');
            }else{
                return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password!');
            }

        }

    } 

}
