<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Mapel;
>>>>>>> cdaff63b75150e6bad07ea6de8b444b196b1dd9a
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

<<<<<<< HEAD
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
=======
    public function addSubMapelForm()
    {
        $mapelList =Mapel::all();
        return view('addSubMapelForm',["mapelList" => $mapelList]);
    }

    public function addSubMapleProcess(Request $request)
    {
        $this->validate($request,[
            'kode_sub_mapel' => 'required|min:2',
            'mapel_id' => 'required',
            'nama_sub_mapel' => 'required|min:3'
        ]);

        $kodeSubMapel = $request->kode_sub_mapel;
        $namaSubMapel = $request->nama_sub_mapel;
        $mapelId      = $request->mapel_id;

        $subMapel = new SubMapel();
        $subMapel->kode_sub_mapel = $kodeSubMapel;
        $subMapel->mapel_id = $mapelId;
        $subMapel->nama_sub_mapel = $namaSubMapel;
        $subMapel->active = "Y";
        $subMapel->save();

        return redirect('/menu/subMapelList');
    }

    public function deleteSubMapel($sub_sub_mapel_id)
    {
        $subMapel=SubMapel::find($sub_sub_mapel_id);
>>>>>>> cdaff63b75150e6bad07ea6de8b444b196b1dd9a
        $subMapel->delete();
        return(redirect('/menu/subMapelList'));
    }

}
