@extends('master.master')

@section('page-title', 'Daftar Pesanan')

@section('title','Daftar Pesanan')

@section('script')
@endsection

@section('header-content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body" style="margin-bottom: -60px;">
                <!-- Card stats -->
            </div>
        </div>
    </div>
@endsection


@section('body-content')
    <div class="row mt-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Table Pesanan</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Pemesanan</th>
                            <th scope="col">Waktu Pemesanan</th>
                            <th scope="col">Lama Mengajar</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach($pesananList as $pesanan)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$pesanan->kode_transaksi}}</td>
                                <td>{{Date("H:i:s, d-m-Y",strtotime($pesanan->tgl_transaksi))}}</td>
                                <td>{{$pesanan->lama_sewa}}</td>
                                <td><a href="/pesan/{{$pesanan->transaksi_id}}/terima" class="btn btn-success">Terima</a></td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/pesan/{{$pesanan->transaksi_id}}/detail">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
