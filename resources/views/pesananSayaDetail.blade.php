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
                    <h3 class="mb-0 text-center">DETAIL PESANAN SAYA
                        <a href="/menu/mapelList" class="btn btn-info" style="float: right;"> << Back</a></h3>
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
                    <div class="row pengajar">
                        <h3>Guru Kursus : <span id="nama_pengajar"></span></h3>
                    </div>
                    <div class="row pengajar">
                        <h3>Waktu Terima : <span id="waktu_terima"></span></h3>
                    </div>
                    <div class="row">
                        <h3>Daftar Sub Mata Pelajaran :</h3>
                        <ol>
                            @for($i=0;$i < count($pesanan->deskripsi_transaksi);$i++)
                            <h4><li>{{$pesanan->deskripsi_transaksi[$i]}}</li></h4>
                            @endfor
                        </ol>
                    </div>
                    <div class="row">
                        <h3>Status Pemesanan : <span id="status"></span></h3>
                    </div>
                    <hr class="my-3">
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
            $(".pengajar").hide();

            setInterval('status()',500)
        });

        function status() {
            var _token = $('input[name="_token"]').val();
            var transaksi_id = $('input[name="transaksi_id"]').val();
            $.ajax({
                url:"/getStatus",
                method:"POST",
                data:{transaksi_id:transaksi_id, _token : _token},
                success:function (result) {
                   var r = result[0];

                   ubahStatus(r);
                   ubahGuru(r);
            // {"status_pemesanan":"N","teacher_id":-1,"teacher_name":null}

                }
            });
        }

        function ubahStatus(r) {
            var status="";
            var btn="";
            if(r.status_pemesanan == 'N'){
                status = "Mencari Pengajar";
                btn = "info";
            }else if (r.status_pemesanan == 'P'){
                status = "Pengajar Ditemukan";
                btn = "success";
            }else if (r.status_pemesanan == 'Y'){
                status = "Pengajar Telah Sampai";
                btn = "info";
            }
            var output ="<li class='btn btn-"+btn+"'>"+status+"</li>";
            $('#status').html(output);
        }

        function ubahGuru(r) {
            if(r.teacher_id != -1){
                $(".pengajar").show();
                $('#nama_pengajar').html(r.teacher_name);
                $('#waktu_terima').html(r.tgl_terima);
            }else {
                $(".pengajar").hide();
                $('#nama_pengajar').html("");
                $('#waktu_terima').html("");
            }

        }
    </script>
@endsection
