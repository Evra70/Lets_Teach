@extends('master.master')

@section('page-title', 'Profile')

@section('title','Profile')

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
                    <h3 class="mb-0">Profile </h3>
                </div>
                <div class="table-responsive">
                        @if(Auth::user()->profile_picture == "")
                            <center><img src="/asset_template/img/theme/no_image.png" style="width: 25%;height: 30%;margin-top: 20px;" class="rounded-circle"></center>
                        @else
                            <center><img src="/profiles/{{Auth::user()->profile_picture}}" style="width: 25%;height: 30%;margin-top: 20px;" class="rounded-circle"></center>
                        @endif
                    <br>
                    <br>
                    <br>
                    <center><form method="post" enctype="multipart/form-data" action="/changeProfile" style="margin-bottom: 30px;">
                        {{csrf_field()}}

                                    <div class="{{ $errors->has('profile') ? ' has-error' : '' }}">
                                        <input type="file" name="profile">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                    @if ($errors->has('profile'))
                                        <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('profile') }}</strong>
                                    </span>
                                    @endif
                    </form></center>
                </div>
            </div>
        </div>
    </div>
@endsection
