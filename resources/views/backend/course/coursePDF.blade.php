@php
$ar_judul = ['No','Nama','deskripsi','Level','kategori','Mentor'];
$no = 1;
@endphp
<h3 align="center">Daftar course</h3>
<br/><br/>
<table border="1" align="center" cellpadding="10" cellspacing="0">
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
			</tr>
		@endforeach
	</tbody>
</table>