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
        <h5 class="card-title">Form Update Peserta</h5>
        <!-- No Labels Form -->
        <form class="row g-3" method="POST" action="{{ route('peserta.update',$row->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
            <label for="basic-url" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $row->nama }}">
            </div>
            <div class="col-md-6">
            <label for="basic-url" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $row->email }}">
            </div>
            <div class="col-md-6">
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        @foreach($ar_jenis_kelamin as $k )
                        @php 
                            $cek = ($k == $row->jenis_kelamin) ? 'checked' : ''; 
                        @endphp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="{{ $k }}" {{$cek}}>
                                <label class="form-check-label">
                                    {{ $k}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" cols="50" rows="5">{{ $row->alamat}}</textarea>
            </div>
            <div class="col-md-6">
            <label for="basic-url" class="form-label">Nomer Hp</label>
                <input type="text" class="form-control" name="no_hp" value="{{$row->no_hp}}">
            </div>
            <div class="col-md-6">
                <label for="basic-url" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" />
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                <a href="{{ url('/peserta') }}" class="btn btn-secondary btn-md">Batal</a>
            </div>
        </form><!-- End No Labels Form -->
    </div>
</div>
@endsection
