<?php

namespace App\Http\Controllers;

use App\Biaya;
use App\Kategori;
use App\Mapel;
use App\SubMapel;
use App\Transaksi;
use App\User;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use UxWeb\SweetAlert\SweetAlert;

class PesanController extends Controller
{

    public function formPemesananById($mapel_id)
    {
        $mapel = Mapel::find($mapel_id);
        $subMapelList=SubMapel::where('mapel_id',$mapel_id)->where('active','Y')->get();
        return view('formPemesananById', ['mapel' => $mapel,"subMapelList"=>$subMapelList]);
    }

    public function addMapelForm()
    {
        $kategoriList=Kategori::all();
        return view('addMapelForm',['kategoriList' => $kategoriList]);
    }

    public function addPemesananProcess(Request $request)
    {
        $this->validate($request,[
            'mapel_id' => 'required',
            'sub_mapel_list' => 'required',
            'lama_sewa' => 'required|numeric'
        ]);
        date_default_timezone_set("Asia/Jakarta ");
        $sub =$request->sub_mapel_list;
        $des = implode(", ", $sub);
//        $des = explode(", ",$des);
            return Date('His');
        $fee = Biaya::find($request->mapel_id);
        $biaya = $request->lama_sewa * $fee->biaya;
        $transaksi = new Transaksi();
        $transaksi->kode_transaksi = Uuid::uuid();
        $transaksi->user_id = Auth::user()->user_id;
        $transaksi->mapel_id = $request->mapel_id;
        $transaksi->tgl_transaksi = Date('YmdHis');
        $transaksi->lama_sewa = $request->lama_sewa;
        $transaksi->deskripsi_transaksi =$des;
        $transaksi->biaya =$biaya;
        $transaksi->status_pemesanan ='N';
        $transaksi->save();

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

        return view('mapelDetail',["mapel" => $mapel[0], "subMapelList" => $subMapelList]);
    }
}
