<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use UxWeb\SweetAlert\SweetAlert;
use Image;
use File;

class LoginController extends Controller
{


    public function home()
    {
        return view('home');
    }

    public function profileDetail()
    {
        $user = User::find(Auth::user()->user_id);
        return view('profile');
    }

    public function changeProfile(Request $request)
    {
        $this->validate($request,[
           "profile"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        File::delete("profiles/".Auth::user()->profile_picture);

        $profile =$request->file("profile");
        $new_name = Date("YmdHis")."_".rand().".".$profile->getClientOriginalExtension();
        $user = User::find(Auth::user()->user_id);
        $user->profile_picture = $new_name;
        $user->save();

        $canvas = Image::canvas(800, 800);
        $resizeImage  = Image::make($profile)->resize(1200, 1200, function($constraint) {
            $constraint->aspectRatio();
        });

        $canvas->insert($resizeImage, 'center');

        $canvas->save('profiles/'.$new_name);

        SweetAlert::info("Foto Profil Berhasil Diganti !","Berhasil");

        return redirect()->back();
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
            return redirect('/');
        }else if(Auth::guard('teacher')->check()){
            Auth::guard('teacher')->logout();
            return redirect('/');
        }else if(Auth::guard('student')->check()){
            Auth::guard('student')->logout();
            return redirect('/');
        }
    }

}
