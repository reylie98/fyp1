<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
        
        $checkusers = User::where('email',$data['email'])->count();
        if($checkusers>0){
            return redirect()->back()->with('flash_message_error','Email already exist !');
        }else{
            echo "Success";
        }
        }
        return view('users.register');
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
}
