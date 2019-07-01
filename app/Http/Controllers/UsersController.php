<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;    
class UsersController extends Controller
{
    public function logon(){
        return view('users.register');
    }
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
        
        $checkusers = User::where('email',$data['email'])->count();
        if($checkusers>0){
            return redirect()->back()->with('flash_message_error','Email already exist !');
        }else{
            $users = new User;
            $users->name =$data['name'];
            $users->email=$data['email'];
            $users->password= bcrypt($data['myPassword']);
            $users->save();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['myPassword'],])){
                Session::put('frontSession',$data['email']);
                return redirect('/cart');
            }
        }
        }

    }
    public function checkemail(Request $request){
        $data = $request->all();
        $checkusers = User::where('email',$data['email'])->count();
        if($checkusers>0){
            echo "false";
        }else{
            echo "true"; die;
        }
    }
    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/');
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'0'])){
                Session::put('frontSession',$data['email']);
                return redirect('/cart');
            }else{
                return redirect()->back()->with('flash_message_error','Invalid Username or Passwrod');
            }
        }
    }
    public function account(){
        return view('users.account');
    }
    public function checkpwd(Request $request){
        $data=$request->all();
        //echo "<pre>"; print_r($data); die;
        $currentpwd1= $data['currentpwd'];
        $userid = Auth::User()->id;
        $checkpwd = User::where('id',$userid)->first();
        if(Hash::check($currentpwd1,$checkpwd->password)){
            echo"true"; die;
        }else{
            echo"false"; die;
        }
    }
    public function updatepwd(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $oldpwd= User::where('id',Auth::User()->id)->first();
            $currentpwd = $data['currentpwd'];
            if(Hash::check($currentpwd,$oldpwd->password)){
                //update password
                $newpwd=bcrypt($data['newpwd']);
                User::where('id',Auth::User()->id)->update(['password' =>$newpwd]);
                return redirect()->back()->with('flash_message_success','Password Successfully Updated!');
            }else{
                return redirect()->back()->with('flash_message_error','Current password is Incorrect');
            }
        }
        
    }
    public function livechat(){
        return view('cs.userlivechat');
    }
}
