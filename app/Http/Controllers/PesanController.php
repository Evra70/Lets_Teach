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
        $subMapelList = SubMapel::where('mapel_id', $mapel_id)->where('active', 'Y')->get();
        return view('formPemesananById', ['mapel' => $mapel, "subMapelList" => $subMapelList]);
    }

    public function addMapelForm()
    {
        $kategoriList = Kategori::all();
        return view('addMapelForm', ['kategoriList' => $kategoriList]);
    }

    public function terimaPesananProcess($transaksi_id)
    {
        $trasaksi = Transaksi::find($transaksi_id);
        $trasaksi->teacher_id = Auth::user()->user_id;
        $trasaksi->status_pemesanan = "P";
        $trasaksi->tgl_terima = Date('YmdHis');
        $trasaksi->versi = $trasaksi->versi + 1;
        $trasaksi->save();
      return redirect("/menu/pesananSaya");
    }

    public function addPemesananProcess(Request $request)
    {
        $this->validate($request, [
            'mapel_id' => 'required',
            'sub_mapel_list' => 'required',
            'lama_sewa' => 'required|numeric'
        ]);
        $sub = $request->sub_mapel_list;
        $des = implode(", ", $sub);
//        $des = explode(", ",$des);

        $fee = Biaya::find($request->mapel_id);
        $biaya = $request->lama_sewa * $fee->biaya;
        $transaksi = new Transaksi();
        $transaksi->kode_transaksi = Uuid::uuid();
        $transaksi->user_id = Auth::user()->user_id;
        $transaksi->mapel_id = $request->mapel_id;
        $transaksi->tgl_transaksi = Date('YmdHis');
        $transaksi->lama_sewa = $request->lama_sewa;
        $transaksi->deskripsi_transaksi = $des;
        $transaksi->biaya = $biaya;
        $transaksi->status_pemesanan = 'N';
        $transaksi->save();

        return redirect('/menu/pesananSaya');
    }

    public function getStatus(Request $request)
    {
        $pesan = DB::table('t_transaksi')
            ->leftJoin('t_user', 't_transaksi.teacher_id', '=', 't_user.user_id')
            ->where('t_transaksi.transaksi_id', $request->transaksi_id)
            ->select('t_transaksi.status_pemesanan', 't_transaksi.teacher_id',
                't_user.fullname as teacher_name', 't_transaksi.tgl_terima', 't_transaksi.biaya', 't_transaksi.versi')->first();
        $pesan->tgl_terima = Date("H:i:s, d-m-Y", strtotime($pesan->tgl_terima));
        if ($pesan->versi != 0) {
            return [$pesan];
        }
        return [$pesan];
    }

    public function pesananSayaDetail()
    {
        $user = User::find(Auth::user()->user_id);
        $id = "";
        if($user->level == "student"){
            $id="user_id";
        }elseif ($user->level == "teacher"){
            $id="teacher_id";
        }
        $pesanan = DB::table('t_transaksi')
            ->leftJoin('t_user', 't_transaksi.teacher_id', '=', 't_transaksi.user_id')
            ->join('t_mapel', 't_transaksi.mapel_id', '=', 't_mapel.mapel_id')
            ->where("t_transaksi.$id",Auth::user()->user_id)
            ->select('t_transaksi.kode_transaksi', 't_mapel.nama_mapel', 't_transaksi.transaksi_id',
                't_transaksi.tgl_transaksi', 't_transaksi.lama_sewa', 't_user.fullname as nama_teacher',
                't_transaksi.biaya', 't_transaksi.deskripsi_transaksi', 't_transaksi.status_pemesanan'
            )->first();
        $pesanan->deskripsi_transaksi = explode(", ", $pesanan->deskripsi_transaksi);
        return view('pesananSayaDetail', ["pesanan" => $pesanan]);
    }

    public function pesananSayaTerimaDetail()
    {
        $pesanan = DB::table('t_transaksi')
            ->leftJoin('t_user', 't_transaksi.teacher_id', '=', 't_transaksi.user_id')
            ->join('t_mapel', 't_transaksi.mapel_id', '=', 't_mapel.mapel_id')
            ->select('t_transaksi.kode_transaksi', 't_mapel.nama_mapel', 't_transaksi.transaksi_id',
                't_transaksi.tgl_transaksi', 't_transaksi.lama_sewa', 't_user.fullname as nama_teacher',
                't_transaksi.biaya', 't_transaksi.deskripsi_transaksi', 't_transaksi.status_pemesanan'
            )->first();
        $pesanan->deskripsi_transaksi = explode(", ", $pesanan->deskripsi_transaksi);

        return view('pesananSayaTerimaDetail', ["pesanan" => $pesanan]);
    }

    public function getPesananList()
    {
        return view('getPesananList');
    }
}
