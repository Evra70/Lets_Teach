<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Mapel;
use App\Biaya;
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
//    $mapelList = Mapel::all();
    $mapelList = DB::table('t_mapel')
        ->join('t_biaya','t_mapel.mapel_id','=','t_biaya.mapel_id')
        ->select('t_mapel.*','t_biaya.biaya')
        ->get();
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
            'nama_mapel' => 'required|min:3',
            'biaya' => 'required|numeric'
        ]);

        $validate = Mapel::where("kode_mapel",$request->kode_mapel)->first();
        if ($validate){
            SweetAlert::info("Kode Pelajaran $request->kode_mapel Telah Terdaftar","Warning!");
            return redirect()->back();
        } else {

        $kodeMapel = $request->kode_mapel;
        $namaMapel = $request->nama_mapel;
        $kategoriId = $request->kategori_id;
        $biaya_mapel = $request->biaya;

        $mapel = new Mapel();
        $mapel->kode_mapel = $kodeMapel;
        $mapel->kategori_id = $kategoriId;
        $mapel->nama_mapel = $namaMapel;
        $mapel->active = "Y";
        $mapel->save();

        $biaya = new Biaya();
        $biaya->mapel_id = $mapel->mapel_id;
        $biaya->biaya = $biaya_mapel;
        $biaya->active = "Y";
        $biaya->save();

        return redirect('/menu/mapelList');
        }
    }

    public function deleteMapel($mapel_id)
    {
        $mapel=Mapel::find($mapel_id);
        $biaya = Biaya::find($mapel_id);
        $mapel->delete();
        $biaya->delete();
        return(redirect('/menu/mapelList'));
    }

    public function editMapelForm($mapel_id)
    {
        $mapelList = DB::table('t_mapel')
            ->join('t_biaya','t_mapel.mapel_id','=','t_biaya.mapel_id')
            ->select('t_mapel.*','t_biaya.biaya')
            ->where('t_mapel.mapel_id','=',$mapel_id)
            ->first();
        $kategoriList=Kategori::all();
        return view('editMapelForm',['kategoriList' => $kategoriList, 'mapel' => $mapelList]);
    }

    public function editMapelProcess(Request $request)
    {
        $this->validate($request,[
            'kode_mapel' => 'required|min:2',
            'kategori_id' => 'required',
            'nama_mapel' => 'required|min:3',
            'biaya' => 'required|numeric',
            'active' => 'required'
        ]);

        $mapel_id = $request->mapel_id;
        $kodeMapel = $request->kode_mapel;
        $namaMapel = $request->nama_mapel;
        $kategoriId = $request->kategori_id;
        $biaya_mapel = $request->biaya;
        $status = $request->active;

        $mapel = Mapel::find($mapel_id);
        $mapel->kode_mapel = $kodeMapel;
        $mapel->kategori_id = $kategoriId;
        $mapel->nama_mapel = $namaMapel;
        $mapel->active = $status;
        $mapel->save();

        Biaya::where('mapel_id',$mapel_id)->update([
            'biaya' => $biaya_mapel
        ]);

        return redirect('/menu/mapelList');
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
