@extends('master.master')

@section('page-title', 'Form Tambah Pemesanan')

@section('title','Tambah Pemesanan')

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
                    <h3 class="mb-0 text-center">FORM TAMBAH PEMESANAN</h3>
                </div>
                <div class="card-body">
                    <form action="/menu/addPemesananProcess" method="post">
                        {{csrf_field()}}
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group  {{ $errors->has('mapel_id') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Nama Mata Pelajaran</label>
                                        <select class="form-control form-control-alternative" id="change" name="mapel_id">
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
                                    <div class="form-group {{ $errors->has('sub_mapel_list') ? ' has-error' : '' }}">
                                        <label class="form-control-label" for="input-email">Sub Mata Pelajaran</label><br>
                                           <div id="sub_mapel">
                                               --Pilih Mapel Terlebih Dahulu--
{{--                                                <input type="checkbox" name="sub_mapel_list[]" value="{{$subMapel->nama_sub_mapel}}">{{$subMapel->nama_sub_mapel}}<br>--}}
                                           </div>
                                    </div>
                                    @if ($errors->has('sub_mapel_list'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('sub_mapel_list') }}</strong>
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
@section('script-js')
    <script>
        $(document).ready(function () {
            $('#change').change(function () {
                if($(this).val() != ''){
                    var mapel_id = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"/getSubMapelList",
                        method:"POST",
                        data:{mapel_id:mapel_id, _token : _token},
                        success:function (result) {
                            // console.log(result);
                            $('#sub_mapel').html(result);
                        }
                    });
                }
            });
        });
    </script>
@endsection
