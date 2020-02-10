@extends('master.master')

@section('page-title', 'Form Tambah Sub Mata Pelajaran')

@section('title','Tambah Sub Mata Pelajaran')

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
                    <h3 class="mb-0 text-center">FORM TAMBAH SUB MATA PELAJARAN</h3>
                </div>
                <div class="card-body">
                    <form action="/menu/addPemesananProcess" method="post">
                        {{csrf_field()}}
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Nama Mata Pelajaran</label>
                                        <input type="text" id="input-fullname" autocomplete="off" class="form-control form-control-alternative" readonly value="{{$mapel->nama_mapel}}">
                                        <input type="hidden" id="input-fullname" class="form-control form-control-alternative" value="{{$mapel->mapel_id}}" name="mapel_id">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('sub_mapel') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Sub Mata Pelajaran</label><br>
                                            @foreach($subMapelList as $subMapel)
                                                <input type="checkbox" name="sub_mapel_list[]" value="{{$subMapel->nama_sub_mapel}}">{{$subMapel->nama_sub_mapel}}<br>
                                            @endforeach
                                    </div>
                                    @if ($errors->has('sub_mapel'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('sub_mapel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('lama_sewa') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Lama Sewa (Jam)</label>
                                        <input type="number" id="input-fullname" min="1" autocomplete="off" class="form-control form-control-alternative" placeholder="Lama Sewa..."  name="lama_sewa">
                                    </div>
                                    @if ($errors->has('lama_sewa'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('lama_sewa') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="submit" value="Pesan" class="btn btn-info">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
