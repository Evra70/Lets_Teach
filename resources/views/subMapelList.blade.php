@extends('master.master')

@section('page-title', 'Daftar Sub Mata Pelajaran')

@section('title','Daftar Sub Mata Pelajaran')

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
                    <h3 class="mb-0">Table Sub Mata Pelajaran</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Sub Mata Pelajaran</th>
                            <th scope="col">Nama Sub Mata Pelajaran</th>
                            <th scope="col">Active</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach($subMapelList as $subMapel)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$subMapel->kode_sub_mapel}}</td>
                                <td>{{$subMapel->nama_sub_mapel}}</td>
                                <td>{{$subMapel->active}}</td>
                                @if(Auth::guard('administrator')->check())
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/subMapel/{{$subMapel->sub_mapel_id}}/delete">Delete</a>
                                                {{--                                                <a class="dropdown-item" href="/menu/editBarangForm/{{$barang->barang_id}}">Edit</a>--}}
                                            </div>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
