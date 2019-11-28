<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
</head>
<body onload="window.print()">

	<img src="{{ url('logo.png') }}" width="80px" height="50px" style="float: left">
	<h3 align="">Invoice </h3>
	<br>
	<h4>Date </h4><i> {{Carbon\Carbon::now()->toFormattedDateString() }}</i>
	<hr>
	<h4>Customer :</h4><i> {{ $customer->title }} {{ $customer->first_name }} {{ $customer->last_name }}</i>
	<h4>Room :</h4><i> {{ $customer->reservation->roomDetail->room->nama }} No {{ $customer->reservation->roomDetail->no }} </i>
	<h4>Telp :</h4><i> {{ $customer->kode_area }} {{ $customer->tlp }} </i>
	<h4>Address :</h4><i> {{ $customer->address }} </i>
	<h4>Day(s) :</h4><i> {{ $customer->reservation->day }} ({{ $customer->reservation->checkin }}-{{ $customer->reservation->checkout}}) </i>


	 <script type="text/javascript">
		setTimeout(function(){ 
			window.location.assign('{{ url('/') }}');
			alert('Terima kasih sudah berkunjung ke hotel kami');
		}, 200);
		</script>   
		

</body>

</html>