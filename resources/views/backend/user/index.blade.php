@extends('backend.index')
@section('content')
@php
$ar_judul = ['No','Nama','Email','Password','Action'];
$no = 1;
@endphp
<h3>Daftar user</h3>
<a href="{{ route('user.create')}}" class="btn btn-primary" title="Tambah Data">
    <i class="bi bi-clipboard-plus"></i>
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
		@foreach($ar_user as $u)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $u->nama }}</td>
				<td>{{ $u->email }}</td>
				<td>{{ $u->password }}</td>
			    <td>
					<form method="POST" action="{{ route('user.destroy', $u->id) }}">
					@csrf 
					@method('DELETE')
                    <a class="btn btn-warning btn-sm" href="{{ route('user.edit', $u->id)}}" title="Ubah User">
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