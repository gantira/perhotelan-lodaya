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
	<h4>Customer :</h4><i> {{ $customer->title }} {{ $customer->first_name }}</i>
	<h4>Meeting Room :</h4><i> {{ $customer->meetingReservation->meeting->nama }}</i>
	<h4>Checkin :</h4><i> {{ $customer->meetingReservation->checkin }}</i>
	<h4>Jam :</h4><i> {{ $customer->meetingReservation->jam }} - {{ Carbon\Carbon::parse($customer->meetingReservation->jam)->addHour(4)->toTimeString() }}</i>
	<h4>Telp :</h4><i> {{ $customer->kode_area }} {{ $customer->tlp }} </i>
	<h4>Address :</h4><i> {{ $customer->address }} </i>
	<h4>Total Bayar :</h4><i> {{ number_format($customer->meetingReservation->total) }}</i>

	<script type="text/javascript">
		setTimeout(function(){ 
			window.location.assign('{{ url('/') }}');
			alert('Terima kasih sudah berkunjung ke hotel kami');
		}, 200);
	</script>   
		

</body>

</html>