@extends('master.master')

@section('page-title', 'Detail Mata Pelajaran')

@section('title','Detail Mata Pelajaran')

@section('script')
@endsection

@section('header-content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
@endsection

@section('body-content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <h3 class="mb-0 text-center">DETAIL MATA PELAJARAN
                        <a href="/menu/mapelList" class="btn btn-info" style="float: right;"> << Back</a></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h3>Kode Mata Pelajaran : {{$mapel->kode_mapel}}</h3>
                    </div>
                    <div class="row">
                        <h3>Nama Mata Pelajaran : {{$mapel->nama_mapel}}</h3>
                    </div>
                    <div class="row">
                        <h3>Kategori Mata Pelajaran : {{$mapel->nama_kategori}}</h3>
                    </div>
                    <div class="row">
                        <h3>Daftar Sub Mata Pelajaran :</h3>
                        <ol>
                            @foreach($subMapelList as $subMapel)
                            <h4><li>{{$subMapel->nama_sub_mapel}}</li></h4>
                            @endforeach
                        </ol>
                    </div>
                    <hr class="my-3">
                    <div class="row">
                        @if(count($transaksi) == 0)
                        <a href="/pesan/{{$mapel->mapel_id}}/form" style="margin-left: 50%;" class="btn btn-success">Pesan</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
