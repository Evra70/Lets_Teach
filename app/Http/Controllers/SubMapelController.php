<?php

namespace App\Http\Controllers;

use App\Mapel;
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

    public function deleteSubMapel($sub_mapel_id)
    {
        $subMapel = SubMapel::find($sub_mapel_id);
        $subMapel->delete();
        return(redirect('/menu/subMapelList'));
    }

    public function addSubMapelForm()
    {
        $mapelList = Mapel::all();
        return view('addSubMapelForm',["mapelList" => $mapelList]);
    }

    public function addSubMapleProcess(Request $request)
    {
        $this->validate($request,[
            'kode_sub_mapel' => 'required|min:2',
            'mapel_id' => 'required',
            'nama_sub_mapel' => 'required|min:3'
        ]);

        $validate = SubMapel::where("kode_sub_mapel",$request->kode_sub_mapel)->first();
        if ($validate){
            SweetAlert::info("Kode Sub Pelajaran $request->kode_sub_mapel Telah Terdaftar","Warning!");
            return redirect()->back();
        } else {

            $kodeSubMapel = $request->kode_sub_mapel;
            $namaSubMapel = $request->nama_sub_mapel;
            $mapelId = $request->mapel_id;

            $subMapel = new SubMapel();
            $subMapel->kode_sub_mapel = $kodeSubMapel;
            $subMapel->mapel_id = $mapelId;
            $subMapel->nama_sub_mapel = $namaSubMapel;
            $subMapel->active = "Y";
            $subMapel->save();

            return redirect('/menu/subMapelList');
        }
    }

    public function editSubMapelForm($id)
    {
        $subMapel = SubMapel::find($id);
        $mapel = Mapel::all();
        return view('editSubMapelForm',['subMapel' => $subMapel,'mapelList' => $mapel]);
    }

    public function editSubMapelProcess(Request $request)
    {
        $this->validate($request,[
            'kode_sub_mapel' => 'required|min:2',
            'nama_sub_mapel' => 'required|min:3',
            'active' => 'required'
        ]);

        $subMapelId = $request->sub_mapel_id;
        $mapelId = $request->mapel_id;
        $kodeSubMapel = $request->kode_sub_mapel;
        $namaSubMapel = $request->nama_sub_mapel;
        $status = $request->active;

        $SubMapel = SubMapel::find($subMapelId);
        $SubMapel->kode_sub_mapel = $kodeSubMapel;
        $SubMapel->nama_sub_mapel = $namaSubMapel;
        $SubMapel->mapel_id = $mapelId;
        $SubMapel->active = $status;
        $SubMapel->save();


        return redirect('/menu/subMapelList');
    }

}
