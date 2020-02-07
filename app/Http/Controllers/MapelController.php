<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use UxWeb\SweetAlert\SweetAlert;

class MapelController extends Controller
{

    public function mapelList()
    {
    $mapelList = Mapel::all();
        return view('mapelList', ['mapelList' => $mapelList]);
    }

    public function addMapelForm()
    {
        return view('addMapelForm');
    }

    public function prosesAddMapelList(Request $request)
    {

    }
    public function deleteMapel($mapel_id)
    {
        $mapel=Mapel::find($mapel_id);
        $mapel->delete();
        return(redirect('/menu/mapelList'));
    }

}
