@extends('backend.index')
@section('content')
<div class="card">
    <div class="card-body">
       <!-- @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif-->
        <h5 class="card-title">Form Mentor</h5>
        <!-- No Labels Form -->
        <form class="row g-3" method="POST" action="{{ route('mentor.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <input type="text" class="form-control @error('nama') is-invalid @else is-valid @enderror" name="nama" placeholder="Nama Mentor" value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="valid-feedback"> isian sudah benar! </div>
                @enderror
            </div>
            <div class="col-md-6">
                <input type="email" class="form-control @error('email') is-invalid @else is-valid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="valid-feedback"> isian sudah benar! </div>
                @enderror
            </div>
            <div class="col-md-6">
            <select name="skill" class="form-select @error('skill') is-invalid @else is-valid @enderror">
                <option value="">-- Pilih Keahlian Mentor --</option>
                @foreach($ar_skill as $s)
                @php $sel = ( old('skill') == $s ) ? 'selected' : ''; @endphp
                <option value="{{ $s }}" {{ $sel }}>{{ $s }}</option>
                @endforeach
            </select>
                @error('skill')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="valid-feedback"> isian sudah benar! </div>
                @enderror
            </div>

            <div class="col-md-6">
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        @foreach($ar_jenis_kelamin as $k)
                        @php $cek = ( old('jenis_kelamin') == $k ) ? 'checked' : ''; @endphp
                            <div class="form-check">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @else is-valid @enderror" type="radio" name="jenis_kelamin" value="{{ $k }}" {{ $cek }}>
                                <label class="form-check-label">
                                    {{ $k }}
                                </label>
                            </div>
                        @endforeach
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="valid-feedback"> isian sudah benar! </div>
                        @enderror
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @else is-valid @enderror" name="deskripsi" cols="50" rows="5">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="valid-feedback"> isian sudah benar! </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @else is-valid @enderror" name="alamat" cols="50" rows="5">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="valid-feedback"> isian sudah benar! </div>
                @enderror
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control @error('no_hp') is-invalid @else is-valid @enderror" name="no_hp" placeholder="No HP" value="{{ old('no_hp') }}">
                @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="valid-feedback"> isian sudah benar! </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label">Foto</label>
                <input type="file" class="form-control @error('foto') is-invalid @else is-valid @enderror" name="foto" />
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="valid-feedback"> isian sudah benar! </div>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning btn-md">Simpan</button>
                <a href="{{ url('/data_mentor') }}" class="btn btn-warning btn-md">Batal</a>
            </div>
        </form><!-- End No Labels Form -->
    </div>
</div>
@endsection
