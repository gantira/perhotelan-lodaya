<!DOCTYPE html>
<html>
<head>
	<title>Laporan Meeting</title>
</head>
<body onload="window.print()">
	<div align="center">
		<img src="{{ url('logo.png') }}" width="80px" height="50px">
		<h3 align="center">Laporan Meeting</h3>
		<small>Periode {{ $awal }} - {{ $akhir }}</small>
	</div>
	
	<table border="1" style="border-style: solid;" width="100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>Customer</th>
				<th>Checkin</th>
				<th>Room</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($meeting as $no => $row)
			<tr>
				<td>{{ $no+1 }}</td>
				<td>{{ $row->customer->title }} {{ $row->customer->first_name }} {{ $row->customer->last_name }}</td>
				<td>{{ $row->checkin }}</td>
				<td>{{ $row->meeting->nama }}</td>
				<td align="right">{{ number_format($row->total) }}</td>
			</tr>

			@if ($loop->last)
				<td colspan="4" align="center">GRAND TOTAL</td>
				<td align="right">{{ number_format($row->sum('total')) }}</td>
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