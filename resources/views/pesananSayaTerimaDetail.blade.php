@extends('master.master')

@section('page-title', 'Detail Pesanan')

@section('title','Detail Pesanan')

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
                    <h3 class="mb-0 text-center">DETAIL PESANAN SAYA
                        <a href="/" class="btn btn-info" style="float: right;"> << Back</a></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h3>Kode Transaksi : {{$pesanan->kode_transaksi}}</h3>
                    </div>
                    <div class="row">
                        <h3>Waktu Transaksi : {{Date("H:i:s, d-m-Y",strtotime($pesanan->tgl_transaksi))}}</h3>
                    </div>
                    <div class="row">
                        <h3>Nama Mata Pelajaran : {{$pesanan->nama_mapel}}</h3>
                    </div>
                    <div class="row">
                        <h3>Waktu Kursus : {{$pesanan->lama_sewa}} Jam</h3>
                    </div>
                    <div class="row">
                        <h3>Biaya Kursus : Rp. {{number_format($pesanan->biaya,2,",",".")}}</h3>
                    </div>
                    <div class="row">
                        <h3>Daftar Sub Mata Pelajaran :</h3>
                        <ol>
                            @for($i=0;$i < count($pesanan->deskripsi_transaksi);$i++)
                            <h4><li>{{$pesanan->deskripsi_transaksi[$i]}}</li></h4>
                            @endfor
                        </ol>
                    </div>
                    <hr class="my-3">
                    <span id="trm"><a href="/pesan/{{$pesanan->transaksi_id}}/terima" class="btn btn-success">Terima</a></span>
                    <input type="hidden" name="transaksi_id" value="{{$pesanan->transaksi_id}}">
                    {{csrf_field()}}
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script-js')
    <script>
        $(document).ready(function(){
            setInterval('status()',750);
        });

        function status() {
            var _token = $('input[name="_token"]').val();
            var transaksi_id = $('input[name="transaksi_id"]').val();
            $.ajax({
                url:"/getStatus",
                method:"POST",
                data:{transaksi_id:transaksi_id, _token : _token},
                success:function (result) {
                    if(result[0].versi != 0){
                        clearInterval();
                        $('#trm').html("<a href='/menu/getPesananList' class='btn btn-danger'>Pesanan Sudah Diambil</a>");
                    }
                }
            });

        }
    </script>
@endsection
