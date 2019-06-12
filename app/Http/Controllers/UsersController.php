<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
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
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['myPassword']])){
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
        return redirect('/');
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('/cart');
            }else{
                return redirect()->back()->with('flash_message_error','Invalid Username or Passwrod');
            }
        }
    }
}
