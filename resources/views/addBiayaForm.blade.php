@extends('master.master')

@section('page-title', 'Form Tambah Biaya')

@section('title','Tambah Biaya')

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
                    <h3 class="mb-0 text-center">FORM TAMBAH BIAYA</h3>
                </div>
                <div class="card-body">
                    <form action="/menu/addBiayaProcess" method="post">
                        {{csrf_field()}}
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('mapel_id') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Nama Mata Pelajaran</label>
                                        <select class="form-control form-control-alternative" name="mapel_id">
                                            <option value="">--Pilih Mapel--</option>
                                            @foreach($mapelList as $mapel)
                                                <option value="{{$mapel->mapel_id}}">{{$mapel->nama_mapel}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('mapel_id'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('mapel_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('biaya') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Biaya / jam</label>
                                        <input type="text" id="input-fullname" autocomplete="off" class="form-control form-control-alternative" placeholder="Biaya ..."  name="biaya">
                                    </div>
                                @if ($errors->has('biaya'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('biaya') }}</strong>
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
