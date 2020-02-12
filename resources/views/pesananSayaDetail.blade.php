@extends('master.master')

@section('page-title', 'Detail Pesanan Saya')

@section('title','Detail Pesanan Saya')

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
                    <h4 class="mb-0 text-center">DETAIL PESANAN SAYA
                        <a href="/menu/mapelList" class="btn btn-info" style="float: right;"> << Back</a></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="transaksi_id" value="{{$pesanan->transaksi_id}}">
                        <input type="hidden" name="login_id" value="{{Auth::user()->user_id}}">
                        <input type="hidden" name="level" value="{{Auth::user()->level}}">
                        {{csrf_field()}}
                        <h4 style="margin-left:20px;">Kode Transaksi : {{$pesanan->kode_transaksi}}</h4>
                    </div>
                    <div class="row">
                        <h4 style="margin-left:20px;">Waktu Transaksi : {{Date("H:i:s, d-m-Y",strtotime($pesanan->tgl_transaksi))}}</h4>
                    </div>
                    <div class="row">
                        <h4 style="margin-left:20px;">Nama Mata Pelajaran : {{$pesanan->nama_mapel}}</h4>
                    </div>
                    <div class="row">
                        <h4 style="margin-left:20px;">Waktu Kursus : {{$pesanan->lama_sewa}} Jam</h4>
                    </div>
                    <div class="row">
                        <h4 style="margin-left:20px;">Biaya Kursus : Rp. {{number_format($pesanan->biaya,2,",",".")}}</h4>
                    </div>
                    <div class="row pengajar">
                        <h4 style="margin-left:20px;">Guru Kursus : <span id="nama_pengajar"></span></h4>
                    </div>
                    <div class="row pengajar">
                        <h4 style="margin-left:20px;">Waktu Terima : <span id="waktu_terima"></span></h4>
                    </div>
                    <div class="row">
                        <h4 style="margin-left:20px;">Daftar Sub Mata Pelajaran :</h4><br>
                    </div>
                    <div class="row">
                        <ul>
                            @for($i=0;$i < count($pesanan->deskripsi_transaksi);$i++)
                                <h5 style="margin-left:40px;"><li>{{$pesanan->deskripsi_transaksi[$i]}}</li></h5>
                            @endfor
                        </ul>
                    </div>
                    <div class="row">
                        <h4 style="margin-left:20px;">Status Pemesanan : <span id="status"></span>
                        </h4>
                    </div>
                    <hr class="my-3">
                    <div class="row">
                        <h4 style="margin-left:20px;"> Aksi :
                            @if(Auth::guard("student")->check())
                                <a style="margin-left: 40px;" href="/pesan/{{$pesanan->transaksi_id}}/batal/user" class="btn btn-danger">Cancel Pesanan</a>
                            @else
                                <a style="margin-left: 40px;" href="/pesan/{{$pesanan->transaksi_id}}/batal/teacher" class="btn btn-danger">Cancel Pesanan</a>
                                <span id="btn_stat"></span>
                            @endif
                        </h4>
                    </div>
                    <div id="xchat">
                        {{\Arrilot\Widgets\AsyncFacade::run('chat_box',[],$pesanan->transaksi_id,Auth::user()->user_id)}}

                    <div class="msger-inputarea" style="width: 80%;margin-left: 10px;">
                        <input  type="text" name="chat_text" class="msger-input" autocomplete="off" required placeholder="Enter your message...">
                        <button id="btn_text" type="submit" class="msger-send-btn">Send</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-js')
    <script>
        $(document).ready(function(){
            $(".pengajar").hide();
            $("#xchat").hide();
            $('#btn_stat').hide();
            $("#btn_text").click(function () {
                var _token = $('input[name="_token"]').val();
                var transaksi_id = $('input[name="transaksi_id"]').val();
                var chat_text = $('input[name="chat_text"]').val();
                var login_id = $('input[name="login_id"]').val();
                if(chat_text != null){
                    $.ajax({
                        url:"/addChat",
                        method:"POST",
                        data:{transaksi_id:transaksi_id, _token : _token,chat_text:chat_text,login_id:login_id},
                        success:function (result) {
                            $('input[name="chat_text"]').val("")
                        }
                    });
                }

            });

            setInterval('status()',500);

        });

        function status() {
            var _token = $('input[name="_token"]').val();
            var transaksi_id = $('input[name="transaksi_id"]').val();
            var level = $('input[name="level"]').val();
            $.ajax({
                url:"/getStatus",
                method:"POST",
                data:{transaksi_id:transaksi_id, _token : _token},
                success:function (result) {
                    if(result[0] != null){
                        var r = result[0];
                        ubahStatus(r,transaksi_id);
                        ubahGuru(r);
                    }else{
                        if(level == "student"){
                            window.location.href="/menu/buatPesanan";
                        } else {
                            window.location.href="/cancelAlert";
                        }
                    }

                }
            });
        }

        function ubahStatus(r,l) {
            var status="";
            var btn="";
            if(r.status_pemesanan == 'N'){
                status = "Mencari Pengajar";
                $('#xchat').hide();
                btn = "info";
            }else if (r.status_pemesanan == 'P'){
                status = "Pengajar Ditemukan";
                btn = "success";
                $('#xchat').show();
                $('#btn_stat').show();
                $('#btn_stat').html("<a style='margin-left: 100px;' href='/pesan/"+l+"/sampai/teacher' class='btn btn-info'>Sampai Tujuan</a>");
            }else if (r.status_pemesanan == 'Y'){
                status = "Pengajar Telah Sampai";
                btn = "info";
                $('#xchat').show();
                $('#btn_stat').show();
                $('#btn_stat').html("<a style='margin-left: 100px;' href='/pesan/"+l+"/selesai/teacher' class='btn btn-info'>Kursus Selesai</a>");
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
