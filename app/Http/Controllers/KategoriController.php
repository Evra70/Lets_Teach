<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use UxWeb\SweetAlert\SweetAlert;

class KategoriController extends Controller
{

    public function kategoriList(){
        $kategoriList = Kategori::all();
        return view('kategoriList',['kategoriList' => $kategoriList]);
    }

    public function addKategoriForm(){
        return view('addKategoriForm');
    }

    public function deleteKategori($kategori_id){
        $kategori = Kategori::find($kategori_id);
        $kategori->delete();

        return redirect('/menu/kategoriList');
    }

    public function addKategoriProcess(Request $request){
        $this->validate($request,[
            'kode_kategori' => 'required|min:2',
            'nama_kategori' => 'required|min:3'
        ]);
        $validate = Kategori::where("kode_kategori",$request->kode_kategori)->first();
        if ($validate){
            SweetAlert::info("Kode kategori $request->kode_kategori Telah Terdaftar","Warning!");
            return redirect()->back();
        } else {

            $kodeKategori = $request->kode_kategori;
            $namaKategori = $request->nama_kategori;

            $kategori = new Kategori();
            $kategori->kode_kategori = $kodeKategori;
            $kategori->nama_kategori = $namaKategori;
            $kategori->active = "Y";
            $kategori->save();

            return redirect('/menu/kategoriList');
        }
    }

    public function editMapelForm($kategori_id)
    {
        $kategoriList=Kategori::find($kategori_id);
        return view('editMapelForm',['kategori' => $kategoriList]);
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

        $mapel = Kategori::find($mapel_id);
        $mapel->kode_mapel = $kodeMapel;
        $mapel->kategori_id = $kategoriId;
        $mapel->nama_mapel = $namaMapel;
        $mapel->active = $status;
        $mapel->save();


        return redirect('/menu/mapelList');
    }
}
