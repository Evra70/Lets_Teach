<?php

namespace App\Http\Controllers;

use App\Biaya;
use App\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiayaController extends Controller
{

    public function biayaList(){
        $biayaList = DB::select("SELECT A.*,B.kode_mapel,B.nama_mapel FROM t_biaya A 
                                        INNER JOIN t_mapel B ON A.mapel_id = B.mapel_id");
        return view('biayaList',['biayaList' => $biayaList]);
    }

    public function addBiayaForm(){
        $mapelList = Mapel::all();
        return view('addBiayaForm',["mapelList" => $mapelList]);
    }

    public function deleteBiaya($biaya_id){
        $biaya = Biaya::find($biaya_id);
        $biaya->delete();

        return redirect('/menu/biayaList');
    }

    public function addBiayaProcess(Request $request){
        $this->validate($request,[
            'mapel_id' => 'required',
            'biaya' => 'required|numeric'
        ]);


        $biaya = new Biaya();
        $biaya->mapel_id = $request->mapel_id;
        $biaya->biaya = $request->biaya;
        $biaya->active = "Y";
        $biaya->save();

        return redirect('/menu/biayaList');
    }
}
