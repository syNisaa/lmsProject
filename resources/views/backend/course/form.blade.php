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
        <h5 class="card-title">Form Course</h5>
        <!-- No Labels Form -->
        <form class="row g-3" method="POST" action="{{ route('course.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <input type="text" class="form-control @error('nama') is-invalid @else is-valid @enderror" 
                name="nama" value="{{ old('nama') }}" placeholder="Nama Course">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <select name="mentor_id" class="form-select @error('mentor_id') is-invalid @else is-valid @enderror">
                    <option>-- Mentor Course --</option>
                    @foreach($ar_mentor as $m)
                    @php $sel = ( old('mentor_id') == $m->id ) ? 'selected' : ''; @endphp
                        <option value="{{ $m->id }}" {{ $sel }}>{{ $m->nama }}</option>
                    @endforeach
                </select>
                @error('mentor_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <fieldset class="row mb-2">
                    <legend class="col-form-label col-sm-4 pt-0">Level Course</legend>
                    <div class="col-sm-10">
                        @foreach($ar_level as $l )
                        @php $cek = ( old('level') == $l ) ? 'checked' : ''; @endphp
                            <div class="form-check">
                                <input class="form-check-input @error('level') is-invalid @else is-valid @enderror" type="radio" name="level" value="{{ $l }}" {{ $cek }}>
                                <label class="form-check-label">
                                    {{ $l }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('level')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </fieldset>
            </div>

            <div class="col-md-6">
                <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @else is-valid @enderror">
                    <option>-- Pilih Kategori Course --</option>
                    @foreach($ar_kategori as $k)
                    @php $sel = ( old('kategori_id') == $k->id ) ? 'selected' : ''; @endphp
                        <option value="{{ $k->id }}" {{ $sel }}>{{ $k->nama }}</option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label ">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @else is-valid @enderror" name="deskripsi" cols="50" rows="5">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label">Foto</label>
                <input type="file" class="form-control @error('foto') is-invalid @else is-valid @enderror" name="foto" value="{{ old('foto') }}" />
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning btn-md">Simpan</button>
                <a href="{{ url('/data_course') }}" class="btn btn-warning btn-md">Batal</a>
            </div>
        </form><!-- End No Labels Form -->
    </div>
</div>
@endsection
