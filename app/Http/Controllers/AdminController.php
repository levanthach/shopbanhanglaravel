<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Htttp\Request as HttpRequest;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else {
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
    	return view('admin_login');
    }
    public function showDashboard(){
        $this->AuthLogin();
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);
    	$result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
    	if($result){
    		Session::put('admin_id', $result->admin_id);
    		Session::put('admin_name', $result->admin_name);
    		return Redirect::to('/dashboard');
    	}else {
    		Session::put('message', 'Tài khoản hoặc mật khẩu không chính xác');
    		return Redirect::to('/admin');
    	}
    }
    public function logout(){
        $this->AuthLogin();
    	Session::put('admin_id', null);
    	Session::put('admin_name', null);
    	return Redirect::to('admin');
    }
}
