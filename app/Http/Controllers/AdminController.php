<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{   
    public function AuthLogin(){
     
            return view('admin_login');
        
    }
    public function login(){
       
        return view('admin_login');
    }
    public function dashboard(){
        $this -> AuthLogin();

        return view('admin.dashboard');
    }

    public function check_login(Request $request){
            $email  = $request->a_email;
            $password = md5($request->a_pass);

            $result = DB::table('tbl_admin')->where('admin_email',$email)->where('admin_password',$password)->first();

            if(!$result){
                Session::put('message','Sai tài khoản hoặc mật khẩu.');
               return redirect('/admin');
            }else{
               
                Session::put('admin_name',$result->name);
                Session::put('admin_id',$result->id);
                Session::put('email',$result->admin_email);
                return redirect('/dashboard');

        }


    }

    public function admin_logout(){
        Session::put('name',null);
        Session::put('id',null);
        Session::put('email',null);
        return view('admin_login');
            
    }

}
