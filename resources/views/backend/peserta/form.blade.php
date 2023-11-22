@extends('backend.index')
@section('content')
<div class="card">
    <div class="card-body">
        <!--@if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif-->
        <h5 class="card-title">Form Peserta</h5>
        <form class="row g-3" method="POST" action="{{ route('peserta.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Peserta" value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        @foreach($ar_jenis_kelamin as $k)
                            <div class="form-check">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" value="{{ $k }}" {{ old('jenis_kelamin') == $k ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $k }}
                                </label>
                            </div>
                        @endforeach
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" cols="50" rows="5">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="No HP" value="{{ old('no_hp') }}">
                @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label">Foto</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" />
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning btn-md">Simpan</button>
                <a href="{{ url('/peserta') }}" class="btn btn-warning btn-md">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
