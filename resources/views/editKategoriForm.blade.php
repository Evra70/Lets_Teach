@extends('master.master')

@section('page-title', 'Form Edit Kategori')

@section('title','Edit Kategori')

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
                    <h3 class="mb-0 text-center">FORM EDIT KATEGORI</h3>
                </div>
                <div class="card-body">
                    <form action="/menu/editKategoriProcess" method="post">
                        {{csrf_field()}}
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('kode_kategori') ? ' has-error' : '' }}">
                                        <input type="hidden" name="kategori_id" value="{{$kategori->kategori_id}}">
                                        <label class="form-control-label" for="input-email">Kode Kategori</label>
                                        <input type="text" id="input-fullname" autocomplete="off"
                                               onkeypress="this.value = this.value + event.key.toUpperCase(); return false;"
                                               class="form-control form-control-alternative" value="{{$kategori->kode_kategori}}" placeholder="Kode Kategori..."  name="kode_kategori">
                                    </div>
                                    @if ($errors->has('kode_kategori'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('kode_kategori') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('nama_kategori') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-username">Nama Kategori</label>
                                        <input type="text" id="input-username" autocomplete="off" class="form-control form-control-alternative" value="{{$kategori->nama_kategori}}" placeholder="Nama Kategori..." name="nama_kategori">
                                    </div>
                                    @if ($errors->has('nama_kategori'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('nama_kategori') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('active') ? ' has-error' : '' }}">
                                        @if($kategori->active == "Y")
                                            <input name="active" id="Y" value="Y" type="radio" checked>
                                            <label for="Y">Yes</label>
                                            <input name="active" id="N" value="N" type="radio">
                                            <label for="N">No</label>
                                        @else
                                            <input name="active" id="Y" value="Y" type="radio" >
                                            <label for="Y">Yes</label>
                                            <input name="active" id="N" value="N" type="radio" checked>
                                            <label for="N">No</label>
                                        @endif
                                    </div>
                                    @if ($errors->has('active'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('active') }}</strong>
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
