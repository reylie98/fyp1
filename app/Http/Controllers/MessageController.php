<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Events\MessageSend;

class MessageController extends Controller
{
    public function userlist(){
        $admin = Auth::user()->admin;
        if($admin == 2){
            $users = User::latest()->where('id','!=',auth()->user()->id)->get();
            if(\Request::ajax()){
                return response()->json($users,200);
            }
            return abort(404);
        } if($admin == 2){
            $users = User::latest()->where('admin',2)->get();
            if(\Request::ajax()){
                return response()->json($users,200);
            }
            return abort(404);
        }else{
            $users = User::latest()->where('admin',2)->get();
            if(\Request::ajax()){
                return response()->json($users,200);
            }
            return abort(404);
        }
        
    }
    public function usermessage($id=null){
        if(!\Request::ajax()){
            return abort(404);
        }
        $user = User::findOrFail($id);
        $messages= Message::where(function($q) use ($id){
            $q->where('from',auth()->user()->id);
            $q->where('to',$id);
            $q->where('type',0);
        })->orWhere(function($q) use($id) {
            $q->where('from',$id);
            $q->where('to',auth()->user()->id);
            $q->where('type',1);
        })->with('user')->get();
        
        return response()->json([
            'messages'=>$messages,
            'user'=>$user,
        ]);
        

    }
    public function sendmessage(Request $request){
        if(!$request->ajax()){
            abort(404);
        }
        $messages = Message::create([
            'message'=>$request->message,
            'from'=>auth()->user()->id,
            'to'=>$request->user_id,
            'type'=>0

        ]);
        $messages = Message::create([
            'message'=>$request->message,
            'from'=>auth()->user()->id,
            'to'=>$request->user_id,
            'type'=>1   

        ]);
        broadcast(new MessageSend($messages));
        return response()->json($messages,201);
    }
}
