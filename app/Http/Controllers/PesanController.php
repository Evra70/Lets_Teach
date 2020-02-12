<?php

namespace App\Http\Controllers;

use App\Biaya;
use App\Chat;
use App\Kategori;
use App\Mapel;
use App\Riwayat;
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

    public function cancelPesananUser($transaksi_id)
    {
       $transaksi =Transaksi::find($transaksi_id);
       $chat = DB::select("DELETE FROM t_chat WHERE send_id ='$transaksi->user_id' OR get_id ='$transaksi->user_id'");
       $transaksi->delete();
       SweetAlert::info("Pesanan Berhasil Dibatalkan !","Berhasil");
       return redirect("/menu/mapelList");
    }

    public function cancelAlert()
    {
        SweetAlert::info("Pesanan Telah Dibatalkan !","Maaf");
        return redirect("/menu/getPesananList");
    }

    public function sampaiPesananTecher($transaksi_id)
    {
        $transaksi =Transaksi::find($transaksi_id);
        $transaksi->status_pemesanan = "Y";
        $transaksi->save();
        return redirect()->back();
    }

    public function selesaiPesananTecher($transaksi_id)
    {
        $transaksi =Transaksi::find($transaksi_id);
        $riwayat = new Riwayat();
        $riwayat->kode_transaksi = $transaksi->kode_transaksi;
        $riwayat->user_id = $transaksi->user_id;
        $riwayat->mapel_id = $transaksi->mapel_id;
        $riwayat->tgl_transaksi = $transaksi->tgl_transaksi;
        $riwayat->tgl_terima = $transaksi->tgl_terima;
        $riwayat->lama_sewa = $transaksi->lama_sewa;
        $riwayat->teacher_id = $transaksi->teacher_id;
        $riwayat->deskripsi_transaksi = $transaksi->deskripsi_transaksi;
        $riwayat->biaya = $transaksi->biaya;
        $riwayat->save();
        $transaksi->delete();
        DB::select("DELETE FROM t_chat WHERE send_id ='$transaksi->user_id' OR get_id ='$transaksi->user_id'");
        return redirect("/menu/getPesananList");
    }

    public function cancelPesananTecher($transaksi_id)
    {
        $transaksi =Transaksi::find($transaksi_id);
        $chat = DB::select("DELETE FROM t_chat WHERE send_id ='$transaksi->teacher_id' OR get_id ='$transaksi->teacher_id'");
        $transaksi->tgl_terima = "00000000000000";
        $transaksi->teacher_id = -1;
        $transaksi->status_pemesanan = "N";
        $transaksi->versi = 0;
        $transaksi->save();
        SweetAlert::info("Pesanan Berhasil Dibatalkan !","Berhasil");
        return redirect("/menu/getPesananList");
    }


    public function addChat(Request $request)
    {
        $transaksi_id = $request->transaksi_id;
        $send_id = $request->login_id;
        $txt = $request->chat_text;
        $transaksi= Transaksi::find($transaksi_id);
        $get_id=0;
        if($transaksi->teacher_id == $send_id){
            $get_id = $transaksi->user_id;
        }else if ($transaksi->user_id == $send_id){
            $get_id = $transaksi->teacher_id;
        }

        $chat=new Chat();
        $chat->send_id =$send_id;
        $chat->get_id =$get_id;
        $chat->txt =$txt;
        $chat->save();
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
        if($pesan != null){
            $pesan->tgl_terima = Date("H:i:s, d-m-Y", strtotime($pesan->tgl_terima));
            if ($pesan->versi != 0) {
                return [$pesan];
            }
        }
        return [$pesan];
    }

    public function pesananSayaDetail()
    {
        $user = User::find(Auth::user()->user_id);
        $id = "";
        $level =$user->level;
        if($level == "student"){
            $id="user_id";
        }elseif ($level == "teacher"){
            $id="teacher_id";
        }
        $cek = DB::table("t_transaksi")->where("user_id",$id)->orWhere("teacher_id",$id)->first();
        if($cek){
            $pesanan = DB::table('t_transaksi')
                ->leftJoin('t_user', 't_transaksi.teacher_id', '=', 't_transaksi.user_id')
                ->join('t_mapel', 't_transaksi.mapel_id', '=', 't_mapel.mapel_id')
                ->where("t_transaksi.$id",Auth::user()->user_id)
                ->select('t_transaksi.kode_transaksi', 't_mapel.nama_mapel', 't_transaksi.transaksi_id',
                    't_transaksi.tgl_transaksi', 't_transaksi.lama_sewa', 't_user.fullname as nama_teacher',
                    't_transaksi.biaya', 't_transaksi.deskripsi_transaksi', 't_transaksi.status_pemesanan'
                )->first();
            if($pesanan != null){
                $pesanan->deskripsi_transaksi = explode(", ", $pesanan->deskripsi_transaksi);
            }

            return view('pesananSayaDetail', ["pesanan" => $pesanan]);
        }else{
            SweetAlert::info("Tidak ada Aktivitas !","Maaf");
            return redirect("/menu/mapelList");
        }

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

    public function riwayatList()
    {
        $user = User::find(Auth::user()->user_id);
        $id = $user->user_id;
        $level =$user->level;
        $riwayatList=[];
        $query ="";
        if($level == "student"){
            $query="INNER JOIN t_user B ON A.teacher_id = B.user_id WHERE A.user_id= '$id'";
        }elseif ($level == "teacher"){
            $query="INNER JOIN t_user B ON A.user_id = B.user_id WHERE A.user_id= '$id'";
        }
        $riwayatList = DB::select("SELECT A.*,B.fullname FROM t_riwayat_transaksi A
                                            $query");

        return view('riwayatList',["riwayatList"=>$riwayatList]);
    }
}
