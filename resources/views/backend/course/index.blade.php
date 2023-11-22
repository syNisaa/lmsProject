@extends('backend.index')
@section('content')
@php
$ar_judul = ['No','Nama','deskripsi','Level','kategori','Mentor','Foto','Action'];
$no = 1;
@endphp
<h3>Daftar course</h3>
<a href="{{ route('course.create')}}" class="btn btn-primary" title="Tambah Data">
    <i class="bi bi-clipboard-plus"></i>
</a>
<a href="{{ route('course.pdf')}}" class="btn btn-danger" title="Export To PDF">
    <i class="bi bi-filetype-pdf"></i>
</a>
<a href="{{ route('course.excel') }}" class="btn btn-success " title="Export to Excel">
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
		@foreach($ar_course as $a)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $a->nama }}</td>
				<td>{{ $a->deskripsi }}</td>
				<td>{{ $a->level }}</td>
				<td>{{ $a->kategori->nama }}</td>
				<td>{{ $a->mentor->nama }}</td>
				<td>
				@if($a->foto)
                <img src="{{ asset('admin/assets/img/course/' . $a->foto) }}" alt="{{ $a->nama }}" width="50" height="50">
           		 @else
                <img src="{{ asset('admin/assets/img/nophoto.jpg') }}" alt="No Image" width="50" height="50">
           		 @endif
        		</td>
                <td>
					<form method="POST" action="{{ route('course.destroy', $a->id) }}">
					@csrf 
					@method('DELETE')
                    <a class="btn btn-warning btn-sm" href="{{ route('course.edit', $a->id)}}" title="Ubah Course">
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