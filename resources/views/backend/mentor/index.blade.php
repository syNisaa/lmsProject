@extends('backend.index')
@section('content')
@php
$ar_judul = ['No','Nama','jenis_kelamin','Email','Skill','Foto','Action'];
$no = 1;
@endphp
<h3>Daftar Mentor</h3>
<a href="{{ route('mentor.create')}}" class="btn btn-primary" title="Tambah Data">
    <i class="bi bi-clipboard-plus"></i>
</a>
<a href="{{ route('mentor.pdf')}}" class="btn btn-danger" title="Export To PDF">
    <i class="bi bi-filetype-pdf"></i>
</a>
<a href="{{ route('mentor.excel') }}" class="btn btn-success " title="Export to Excel">
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
		@foreach($ar_mentor as $m)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $m->nama }}</td>
				<td>{{ $m->jenis_kelamin }}</td>
				<td>{{ $m->email }}</td>
				<td>{{ $m->skill }}</td>
                <td>
				@if($m->foto)
                <img src="{{ asset('backend/assets/img/mentor/' . $m->foto) }}" alt="{{ $m->nama }}" width="50" height="50">
           		 @else
                <img src="{{ asset('backend/assets/img/nophoto.jpg') }}" alt="No Image" width="50" height="50">
           		 @endif
        		</td>
				<td>
				<form method="POST" action="{{ route('mentor.destroy', $m->id) }}">
					@csrf 
					@method('DELETE')
					<a class="btn btn-info btn-sm" href="{{ route('mentor.show', $m->id) }}" title="Detail Mentor">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" href="{{ route('mentor.edit', $m->id) }}" title="Ubah Mentor">
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