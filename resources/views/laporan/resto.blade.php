<!DOCTYPE html>
<html>
<head>
	<title>Laporan Resto</title>
</head>
<body onload="window.print()">
	<div align="center">
		<img src="{{ url('logo.png') }}" width="80px" height="50px">
		<h3 align="center">Laporan Resto</h3>
		<small>Periode {{ $awal }} - {{ $akhir }}</small>
	</div>
	
	<table border="1" style="border-style: solid;" width="100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Room</th>
					<th>Tanggal</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($resto_pesanan as $no => $row)
				<tr>
					<td>{{ $no+1 }}</td>
					<td>{{ $row->roomDetail->room->nama }}</td>
					<td>{{ $row->created_at }}</td>
					<td align="right">{{ number_format($row->restoPesananDetail->sum('harga')) }}</td>
				</tr>
			@if ($loop->last)
				<tr>
					<td colspan="3" align="center">GRAND TOTAL</td>
					<td align="right">{{ number_format($total) }}</td>
				</tr>
			@endif
			@endforeach

			</tbody>
		</table>

	<script type="text/javascript">
		setTimeout(function(){ 
			window.history.back();
		}, 200);
	</script>  	

</body>

</html>