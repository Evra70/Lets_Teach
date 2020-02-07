@extends('master.master')

@section('page-title', 'Form Tambah Barang')

@section('title','Tambah Barang')

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
                    <h3 class="mb-0 text-center">FORM TAMBAH MAPEL</h3>
                </div>
                <div class="card-body">
                    <form action="/menu/addMapelForm" method="post">
                        {{csrf_field()}}
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('kode_mapel') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Kode Mapel</label>
                                        <input type="text" id="input-fullname" autocomplete="off" class="form-control form-control-alternative" placeholder="Kode Mapel..."  name="nama_barang">
                                    </div>
                                    @if ($errors->has('kode_mapel'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('kode_mapel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('nama_mapel') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Nama Mapel</label>
                                        <input type="text" id="input-fullname" autocomplete="off" class="form-control form-control-alternative" placeholder="Nama Mapel..."  name="nama_barang">
                                    </div>
                                    @if ($errors->has('kode_mapel'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('kode_mapel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('kategori_id') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Kategori</label>
                                        <select class="form-control form-control-alternative">
                                            <option value="">--Pilih Kategori--</option>
{{--                                            @foreach($kategoriList as $kategori)--}}
{{--                                                <option value="{{$kategori->kategori_id}}">{{$kategori->nama_kategori}}</option>--}}
{{--                                            @endforeach--}}
                                        </select>
                                    </div>
                                    @if ($errors->has('kategori_id'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('kategori_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="submit" value="Tambah" class="btn btn-info">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
