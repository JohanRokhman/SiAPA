@extends('layouts.admin')
@include('layouts.notifikasi')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <!-- Area Chart -->
        <div class="col-xl-11 col-lg-6 ">
            <div class="card shadow mb-12">
            
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data PKL</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{action('PelakuUsahaController@proses_tambahData')}}" enctype="multipart/form-data">   
                    @csrf
                        <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                            <div class="col-md-5">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label text-md-right">{{ __('alamat') }}</label>
                            <div class="col-md-5">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>    
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kecamatan" class="col-sm-4 col-form-label text-md-right">{{ __('kecamatan') }}</label>
                            <div class="col-md-5">
                                <select id="kecamatan" type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{ old('kecamatan') }}" required autocomplete="kecamatan" autofocus>
                                    <option>Batu</option>
                                    <option>Bumiaji</option>
                                    <option>Junrejo</option>
                                </select >
                                    @error('kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelurahan" class="col-sm-4 col-form-label text-md-right">{{ __('kelurahan') }}</label>
                            <div class="col-md-5">
                                <select id="kelurahan" type="text" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" value="{{ old('kelurahan') }}" required autocomplete="kelurahan" autofocus>
                                    <option>Batu</option>
                                    <option>Bumiaji</option>
                                    <option>Junrejo</option>
                                </select >
                                    @error('kelurahan')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_usaha" class="col-sm-4 col-form-label text-md-right">{{ __('Jenis Usaha') }}</label>
                            <div class="col-md-5">
                                        <input id="jenis_usaha" type="text" class="form-control @error('jenis_usaha') is-invalid @enderror" name="jenis_usaha" value="{{ old('jenis_usaha') }}" required autocomplete="jenis_usaha" autofocus>
                                        @error('jenis_usaha')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_pkl" class="col-sm-4 col-form-label text-md-right">{{ __('Jenis Pkl') }}</label>
                            <div class="col-md-5">
                                <input id="jenis_pkl" type="text" class="form-control @error('jenis_pkl') is-invalid @enderror" name="jenis_pkl" value="{{ old('jenis_pkl') }}" required autocomplete="jenis_pkl" autofocus>
                                @error('jenis_pkl')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-4 col-form-label text-md-right">{{ __('foto') }}</label>
                            <div class="col-md-5">
                                    <input id="foto" type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" required autocomplete="foto" autofocus>
                                    @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="data_id" class="col-sm-4 col-form-label text-md-right">{{ __('data_id') }}</label> --}}
                            <div class="col-md-5">
                                    <input id="data_id" type="hidden" class="form-control-file @error('data_id') is-invalid @enderror" name="data_id" value="{{ Auth::user()->id }}" required autocomplete="data_id" autofocus>
                                    @error('data_id')
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
