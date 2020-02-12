@extends('master.master')

@section('page-title', 'Daftar Riwayat')

@section('title','Daftar Riwayat')

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
                    <h3 class="mb-0">Table Riwayat</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Transaksi</th>
                            <th scope="col">Nama @if(Auth::user()->level == "teacher") Murid @else Mentor @endif</th>
                            <th scope="col">Waktu Pesan</th>
                            <th scope="col">Waktu Terima</th>
                            <th scope="col">Lama Kursus</th>
                            <th scope="col">Biaya</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach($riwayatList as $riwayat)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$riwayat->kode_transaksi}}</td>
                                <td>{{$riwayat->fullname}}</td>
                                <td>{{Date("H:i:s, d-m-Y",strtotime($riwayat->tgl_transaksi))}}</td>
                                <td>{{Date("H:i:s, d-m-Y",strtotime($riwayat->tgl_terima))}}</td>
                                <td>{{$riwayat->lama_sewa}} Jam</td>
                                <td>Rp. {{number_format($riwayat->biaya,2,",",".")}}</td>
                            </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
