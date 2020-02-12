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
                            {{\Arrilot\Widgets\AsyncFacade::run('new_order',[],Auth::user()->user_id)}}

            </div>
        </div>
    </div>
@endsection
