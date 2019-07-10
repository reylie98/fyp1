<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Ticket;
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
    public function knowledgebase(){
        return view('cs.knowledgebase');
    }
    public function viewTicket(){
        $tickets = Ticket::paginate(10);
        // $tickets = Ticket::;
        return view('admin.viewticket')->with(compact('tickets'));
    }
    public function editTicket(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            $admin= Auth::user()->name;
            $ticket = Ticket::find($id);
            $ticket->comment = $data['Comment'];
            $ticket->status = $data['statustype'];
            $ticket->admin = $admin;
            $ticket->save();
            return redirect()->action('AdminController@viewTicket')->with('flash_message_success','Ticket has been updated');
        }
        $ticketdetail = Ticket::find($id);
        return view('admin.editticket')->with(compact('ticketdetail'));
    }
    public function viewUsers(){
        $users=User::where('admin',0)->get();
        return view('cs.viewuser')->with(compact('users'));
    }
    public function livechat(){
        return view('cs.livechat');
    }
    public function addadmin(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $chckemail = User::where(['email'=>$data['email']])->count();
            if($chckemail>0){
                return redirect()->back()->with('flash_message_error', 'Email Already Exist');
            }else{
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password= bcrypt($data['password']);
            $user->admin = $data['type'];
            $user->save();
            return redirect()->back()->with('flash_message_success', 'Admin Successfully Added!');
            }
        }
        return view('admin.addadmin');
    }

}
