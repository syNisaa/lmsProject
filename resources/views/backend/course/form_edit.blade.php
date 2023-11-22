@extends('backend.index')
@section('content')
<div class="card">
    <div class="card-body">
    @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h5 class="card-title">Form Edit Course</h5>
        <!-- No Labels Form -->
        <form class="row g-3" method="POST" action="{{ route('course.update',$row->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
            <label for="basic-url" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $row->nama }}">
            </div>
            <div class="col-md-6">
            <label for="basic-url" class="form-label">Mentor</label>
                <select name="mentor_id" class="form-select">
                    <option>-- Mentor Course --</option>
                    @foreach($ar_mentor as $m)
                    @php 
                        $sel = ($m->id == $row->mentor_id) ? 'selected' : ''; 
                    @endphp
                        <option value="{{ $m->id }}" {{ $sel }}>{{ $m->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <fieldset class="row mb-2">
                    <legend class="col-form-label col-sm-4 pt-0">Level Course</legend>
                    <div class="col-sm-10">
                        @foreach($ar_level as $l )
                        @php 
                            $cek = ($l == $row->level) ? 'checked' : ''; 
                        @endphp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="level" value="{{ $l }}" {{ $cek }}>
                                <label class="form-check-label">
                                    {{ $l }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6">
            <label for="basic-url" class="form-label">kategori</label>
                <select name="kategori_id" class="form-select">
                    <option>-- Pilih Kategori Course --</option>
                    @foreach($ar_kategori as $k)
                    @php 
                        $sel = ($k->id == $row->kategori_id) ? 'selected' : ''; 
                    @endphp
                        <option value="{{ $k->id }}" {{ $sel }}>{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi"  cols="50" rows="5">{{ $row->deskripsi }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" />
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                <a href="{{ url('/data_course') }}" class="btn btn-secondary btn-sm">Batal</a>
            </div>
        </form><!-- End No Labels Form -->
    </div>
</div>
@endsection
