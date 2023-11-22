@php
$ar_judul = ['No','Nama','jenis_kelamin','Email','Skill'];
$no = 1;
@endphp
<h3 align="center">Data Mentor</h3>
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
		@foreach($ar_mentor as $m)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $m->nama }}</td>
				<td>{{ $m->jenis_kelamin }}</td>
				<td>{{ $m->email }}</td>
				<td>{{ $m->skill }}</td>	
			</tr>
		@endforeach
	</tbody>
</table>