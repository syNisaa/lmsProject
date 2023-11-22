@php
$ar_judul = ['No','Nama','Email','Alamat','No Hp'];
$no = 1;
@endphp
<h3 align="center">Data Peserta</h3>
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
		@foreach($ar_peserta as $p)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $p->nama }}</td>
				<td>{{ $p->email }}</td>
				<td>{{ $p->alamat }}</td>
				<td>{{ $p->no_hp }}</td>
			</tr>
		@endforeach
	</tbody>
</table>