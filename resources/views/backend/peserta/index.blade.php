@extends('backend.index')
@section('content')
@php
$ar_judul = ['No','Nama','Email','Alamat','No Hp','Foto','Action'];
$no = 1;
@endphp
<h3>Daftar Peserta</h3>
<a href="{{ route('peserta.create')}}" class="btn btn-primary" title="Tambah Data">
    <i class="bi bi-clipboard-plus"></i>
</a>
<a href="{{ route('peserta.pdf')}}" class="btn btn-danger" title="Export To PDF">
    <i class="bi bi-filetype-pdf"></i>
</a>
<a href="{{ route('peserta.excel') }}" class="btn btn-success " title="Export to Excel">
	<i class="bi bi-file-earmark-excel"></i>
</a>
<br/><br/>
<table class="table datatable">
	<thead>
		<tr>
			@foreach($ar_judul as $jdl)
				<th>{{ $jdl }}</th>
			@endforeach
		</tr>
	</thead>
	<tbody>
		@foreach($ar_peserta as $p)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $p->nama }}</td>
				<td>{{ $p->email }}</td>
				<td>{{ $p->alamat }}</td>
				<td>{{ $p->no_hp }}</td>
				<td>
				@if($p->foto)
                <img src="{{ asset('backend/assets/img/peserta/' . $p->foto) }}" alt="{{ $p->nama }}" width="50" height="50">
           		 @else
                <img src="{{ asset('backend/assets/img/nophoto.jpg') }}" alt="No Image" width="50" height="50">
           		 @endif
				</td>
                <td>
				<form method="POST" action="{{ route('peserta.destroy', $p->id) }}">
					@csrf 
					@method('DELETE')
					<a class="btn btn-info btn-sm" href="{{ route('peserta.show', $p->id) }}" title="Detail Peserta">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" href="{{ route('peserta.edit', $p->id) }}" title="Ubah Peserta">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
					<button type="submit" title="Hapus Asset" class="btn btn-danger btn-sm"
						name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
						<i class="bi bi-trash"></i>
					</button>
				</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection