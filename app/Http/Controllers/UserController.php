<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Mapel;
use App\SubMapel;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use UxWeb\SweetAlert\SweetAlert;

class UserController extends Controller
{

    public function userList($level)
    {
        $userList = User::where("level",$level)->get();
        return $userList;
    }

}
