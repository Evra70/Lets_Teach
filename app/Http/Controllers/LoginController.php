<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use UxWeb\SweetAlert\SweetAlert;

class LoginController extends Controller
{

    public function index(){
        return view("welcome");
    }
    public function masuk(Request $request){
        $this->validate($request,[
            'auth' => 'required',
            'password' => 'required'
        ]);
        $auth =$request->auth;
        $password = md5($request->password);
//        $user = User::where('email','=',$auth)->orWhere('username','=',$auth)
//            ->where('password',$password)->first();

        $user =  DB::select("SELECT * FROM t_user WHERE (email='$auth' OR username='$auth') AND password='$password'");

        if(count($user) > 0){
            $user =  (object) $user[0];

            $level=$user->level;
            Auth::guard("$level")->LoginUsingId($user->user_id);
            return redirect("/$level");
        }else{
            SweetAlert::info('Anda Gagal Login !','Maaf');
            return redirect()->back();
        }

    }

    private function redirectWithStatus($alert,$status){
        return redirect('/')->with('status', "$status")->with('proses',"$alert");
    }

    public function keluar(){
        if(Auth::guard('administrator')->check()){
            Auth::guard('administrator')->logout();
        }else if(Auth::guard('teacher')->check()){
            Auth::guard('teacher')->logout();
        }else if(Auth::guard('student')->check()){
            Auth::guard('student')->logout();
        }
        return redirect('/');
    }

}
