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

    public function editKategoriForm($kategori_id)
    {
        $kategoriList=Kategori::find($kategori_id);
        return view('editKategoriForm',['kategori' => $kategoriList]);
    }

    public function editKategoriProcess(Request $request)
    {
        $this->validate($request,[
            'kode_kategori' => 'required|min:2',
            'nama_kategori' => 'required|min:3',
            'active' => 'required'
        ]);

        $kategoriId = $request->kategori_id;
        $kodeKategori = $request->kode_kategori;
        $namaKategori = $request->nama_kategori;
        $status = $request->active;

        $kategori = Kategori::find($kategoriId);
        $kategori->kode_kategori = $kodeKategori;
        $kategori->nama_kategori = $namaKategori;
        $kategori->active = $status;
        $kategori->save();


        return redirect('/menu/kategoriList');
    }
}
