<?php

namespace App\Http\Controllers;

use App\User;
use App\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use UxWeb\SweetAlert\SweetAlert;

class RegistrasiController extends Controller
{


    public function registrasi(Request $request){
        $this->validate($request,[
            'fullname' => 'required|min:5|max:50',
            'username' => 'required|min:5|max:20',
            'email' => 'required',
            'password' => 'required|min:5',
            'confirm_password' => 'required|min:5',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
        ]);

        $user = User::where('username',$request->username)->orWhere('email',$request->email)->first();
        if($request->password == $request->confirm_password){
            if(isset($user)){
                SweetAlert::info('Username dan Email Telah Terdaftar !','MAAF');
                return redirect()->back();
            }else{

                    $user = new User();
                    $user->fullname = $request->fullname;
                    $user->username = $request->username;
                    $user->email = $request->email;
                    $user->level    = 'student';
                    $user->active    = 'Y';
                    $user->password = md5($request->password);
                    $user->save();

                    $userLocation = new UserLocation();
                    $userLocation->user_id = $user->user_id;
                    $userLocation->province_id = $request->province_id;
                    $userLocation->regency_id = $request->regency_id;
                    $userLocation->district_id = $request->district_id;
                    $userLocation->save();

                    Auth::guard("student")->LoginUsingId($user->user_id);
                    return redirect('/student');

            }
        }else{
            SweetAlert::info('Password Tidak Sinkron !','MAAF');
            return redirect()->back();
        }

    }

}
