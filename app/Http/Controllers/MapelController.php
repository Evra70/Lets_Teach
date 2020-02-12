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
            'kode_mapel' => 'required|min:2',
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

    public function mapelStudentDetail($mapel_id)
    {
        $mapel=DB::select("SELECT A.nama_mapel,A.mapel_id,A.kode_mapel,A.active,B.nama_kategori FROM t_mapel A 
                                  INNER JOIN t_kategori B ON A.kategori_id = B.kategori_id");
        $subMapelList=SubMapel::where('mapel_id',$mapel_id)->where('active','Y')->get();
        $transaksi = Transaksi::where("user_id",Auth::user()->user_id)->get();
        return view('mapelDetail',["mapel" => $mapel[0], "subMapelList" => $subMapelList,"transaksi"=>$transaksi]);
    }
}
