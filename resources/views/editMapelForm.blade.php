@extends('master.master')

@section('page-title', 'Form Edit Mata Pelajaran')

@section('title','Edit Mata Pelajaran')

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
                    <h3 class="mb-0 text-center">FORM EDIT MATA PELAJARAN</h3>
                </div>
                <div class="card-body">
                    <form action="/menu/editMapelProcess" method="post">
                        {{csrf_field()}}
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" value="{{ $mapel->mapel_id }}" name="mapel_id">
                                    <div class="form-group {{ $errors->has('kode_mapel') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Kode Mata Pelajaran</label>
                                        <input type="text" id="input-fullname" autocomplete="off"
                                               onkeypress="this.value = this.value + event.key.toUpperCase(); return false;"
                                               class="form-control form-control-alternative" value="{{ $mapel->kode_mapel  }}" placeholder="Kode Mapel..." readonly name="kode_mapel">
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
                                        <label class="form-control-label" for="input-email">Nama Mata Pelajaran</label>
                                        <input type="text" id="input-fullname" autocomplete="off" class="form-control form-control-alternative" value="{{ $mapel->nama_mapel }}" placeholder="Nama Mapel..."  name="nama_mapel">
                                    </div>
                                    @if ($errors->has('nama_mapel'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('nama_mapel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('kategori_id') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Kategori Mata Pelajaran</label>
                                        <select class="form-control form-control-alternative" name="kategori_id">
                                            @foreach($kategoriList as $kategori)
                                                @if($mapel->kategori_id == $kategori->kategori_id)
                                                    <option value="{{$kategori->kategori_id}}" selected>{{$kategori->nama_kategori}}</option>
                                                @else
                                                    <option value="{{$kategori->kategori_id}}">{{$kategori->nama_kategori}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('kategori_id'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('kategori_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('biaya') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Biaya / jam</label>
                                        <input type="text" id="input-fullname" autocomplete="off" class="form-control form-control-alternative" value="{{ $mapel->biaya  }}" placeholder="Biaya ..."  name="biaya">
                                    </div>
                                    @if ($errors->has('biaya'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('biaya') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('active') ? ' has-error' : '' }}">
                                        @if($mapel->active == "Y")
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
                                    <input type="submit" value="Update" class="btn btn-info">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
