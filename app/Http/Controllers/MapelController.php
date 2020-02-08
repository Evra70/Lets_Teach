<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Mapel;
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
        $kategoriList=Kategori::all();
        return view('addMapelForm',['kategoriList' => $kategoriList]);
    }

    public function addMapelProcess(Request $request)
    {

        $this->validate($request,[
            'kode_mapel' => 'required|min:3',
            'kategori_id' => 'required',
            'nama_mapel' => 'required|min:3'
        ]);

        $kodeMapel = $request->kode_mapel;
        $namaMapel = $request->nama_mapel;
        $kategoriId = $request->kategori_id;

        $mapel = new Mapel();
        $mapel->kode_mapel = $kodeMapel;
        $mapel->kategori_id = $kategoriId;
        $mapel->nama_mapel = $namaMapel;
        $mapel->active = "Y";
        $mapel->save();

        return redirect('/menu/mapelList');
    }

    public function deleteMapel($mapel_id)
    {
        $mapel=Mapel::find($mapel_id);
        $mapel->delete();
        return(redirect('/menu/mapelList'));
    }

}
