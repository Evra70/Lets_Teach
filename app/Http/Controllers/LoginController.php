<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function index(){
        return view("welcome");
    }
    public function masuk(Request $request){
        $this->validate($request,[
            'auth' => 'required|min:5',
            'password' => 'required'
        ]);
        $auth = $request->auth;
        $password = md5($request->password);
        $user = User::where('username',$auth)->orWhere('email',$auth)
            ->where('password',$password)->first();
        if(isset($user)){
            $level=$user->level;
            Auth::guard("$level")->LoginUsingId($user['user_id']);
            return redirect("/$level");
        }else{
            $alert = "danger";
            $status = "Anda Gagal Login ! ";
            return $this->redirectWithStatus($alert,$status);
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
