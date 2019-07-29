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
                    <form method="POST" action="{{action('PelakuUsahaController@penghasilan')}}" enctype="multipart/form-data">   
                    @csrf
                    <div class="form-group row">
                            <label for="tanggal" class="col-sm-4 col-form-label text-md-right">{{ __('tanggal') }}</label>
                                <div class="col-md-5">
                                    <select id="tanggal" type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" required autocomplete="tanggal" autofocus>
                                    @php
                                    for($a=1; $a<=31; $a+=1){
                                    echo"<option value=$a> $a </option>";
                                    }
                                    @endphp
                                    </select>
                                    @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="form-group row">
                        <label for="bulan" class="col-sm-4 col-form-label text-md-right">{{ __('bulan') }}</label>
                            <div class="col-md-5">
                                <select id="bulan" type="text" class="form-control @error('bulan') is-invalid @enderror" name="bulan" value="{{ old('bulan') }}" required autocomplete="bulan" autofocus>
                                
                                @php
                                 $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                    $jlh_bln=count($bulan);
                                    for($c=0; $c<$jlh_bln; $c+=1){
                                    echo"<option value=$bulan[$c]> $bulan[$c] </option>";
                                    }   
                                @endphp
                                </select>
                                @error('bulan')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="tahun" class="col-sm-4 col-form-label text-md-right">{{ __('tahun') }}</label>
                                    <div class="col-md-5">
                                        <select id="tahun" type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}" required autocomplete="tahun" autofocus>
                                        
                                        @php
                                        $now=date('Y');
                                        for ($a=2012;$a<=$now;$a++){
                                            echo "<option value='$a'>$a</option>";
                                        }
                                        @endphp
                                        </select>
                                        @error('tahun')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-4 col-form-label text-md-right">{{ __('jumlah') }}</label>
                                <div class="col-md-5">
                                    <input id="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') }}" required autocomplete="jumlah" autofocus>
                                    @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-5">
                                    <input id="penghasilan_id" type="hidden" class="form-control @error('penghasilan_id') is-invalid @enderror" name="penghasilan_id" value="{{ Auth::user()->id }}" required autocomplete="penghasilan_id" autofocus>
                                    @error('penghasilan_id')
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
