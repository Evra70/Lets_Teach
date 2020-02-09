<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

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
