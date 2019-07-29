@extends('layouts.admin')
@section('content')
@include('layouts.notifikasi')
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <!-- Area Chart -->
        <div class="col-xl-11 col-lg-6 ">
            <div class="card shadow mb-12">
            
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profil</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="/Settingprofil/{{Auth::user()->id}}" enctype="multipart/form-data">   
                        
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('name') }}</label>
                            <div class="col-md-5">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('email') }}</label>
                            <div class="col-md-5">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-md-right">{{ __('password') }}</label>
                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" required autocomplete="password" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection