<?php

namespace App\Http\Controllers;

use App\SubMapel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use UxWeb\SweetAlert\SweetAlert;

class SubMapelController extends Controller
{

    public function subMapelList()
    {
    $subMapelList = SubMapel::all();
        return view('subMapelList', ['subMapelList' => $subMapelList]);
    }

//    public function addSubMapelForm()
//    {
//        return view('addSubMapelForm');
//    }

//    public function prosesAddMapelList(Request $request)
//    {
//
//    }
    public function deleteSubMapel($sub_mapel_id)
    {
        $subMapel=SubMapel::find($sub_mapel_id);
        $subMapel->delete();
        return(redirect('/menu/subMapelList'));
    }

}
