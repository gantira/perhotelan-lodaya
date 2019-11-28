@extends('admin', ['dashboard'=>'active'])

@section('content')

    <div class="ui form">
        <h1 align="center">Dashboard</h1>
        <div class="ui divider"></div>
        
        <div class="ui six statistics">
		  <div class="statistic">
		    <div class="value">
		      {{ $total_reservation }}
		    </div>
		    <div class="label">
		      Reservation(s)
		    </div>
		  </div>
		  <div class="statistic">
		    <div class="value">
		      {{ $total_news }}
		    </div>
		    <div class="label">
		      News
		    </div>
		  </div>
		  <div class="statistic">
		    <div class="value">
		      <i class="hotel icon"></i> {{ $total_room }}
		    </div>
		    <div class="label">
		      Room(s)
		    </div>
		  </div>
		  <div class="statistic">
		    <div class="value">
		      <i class="food icon"></i> {{ $total_resto }}
		    </div>
		    <div class="label">
		      Resto(s)
		    </div>
		  </div>
		  <div class="statistic">
		    <div class="value">
		      <i class="leaf icon"></i> {{ $total_laundry }}
		    </div>
		    <div class="label">
		      Laundry(s)
		    </div>
		  </div>
		  <div class="statistic">
		    <div class="value">
		      <img src="{{ asset('joe.jpg') }}" class="ui circular inline image">
		      {{ $total_customer }}
		    </div>
		    <div class="label">
		      Customer(s)
		    </div>
		  </div>
		</div>
		<br>
		<br>
		<br>

		<div>
			<p>Reservation Hotel: </p>

			<table class="ui black table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Customer</th>
						<th>Checkin</th>
						<th>Checkout</th>
						<th>Day(s)</th>
						<th>Room</th>
						<th>No</th>
						<th>ExtraBed+</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($reservation as $no => $row)
					<tr>
						<td>{{ $no+1 }}</td>
						<td>{{ $row->customer->title }} {{ $row->customer->first_name }} {{ $row->customer->last_name }}</td>
						<td>{{ $row->checkin }}</td>
						<td>{{ $row->checkout }}</td>
						<td>{{ $row->day }}</td>
						<td>{{ $row->roomDetail->room->nama }}</td>
						<td>{{ $row->room_detail_id }}</td>
						<td>{{ $row->extrabed }}</td>
						<td>{{ number_format($row->total) }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{-- <p align="right"><a href="{{ url('/admin/laporan/hotel') }}">Print</a></p> --}}
			<p align="right"><a href="#" onclick="modal_reservation()">Print</a></p>
		</div>


    <div>
			<p>Reservation Meeting Room: </p>

			<table class="ui black table">
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
				@foreach ($reservation_meetingroom as $no => $row)
					<tr>
						<td>{{ $no+1 }}</td>
						<td>{{ $row->customer->title }} {{ $row->customer->first_name }} {{ $row->customer->last_name }}</td>
						<td>{{ $row->checkin }}</td>
						<td>{{ $row->meeting->nama }}</td>
						<td>{{ number_format($row->total) }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{-- <p align="right"><a href="{{ url('/admin/laporan/meeting') }}">Print</a></p> --}}
			<p align="right"><a href="#" onclick="modal_meetingroom()">Print</a></p>
		</div>

    </div>

    <div>
		<p>Resto(s): </p>

		<table class="ui black table">
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
					<td>{{ number_format($row->restoPesananDetail->sum('harga')) }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{-- <p align="right"><a href="{{ url('/admin/laporan/resto') }}">Print</a></p> --}}
		<p align="right"><a href="#" onclick="modal_resto()">Print</a></p>
	</div>

	<div>
		<p>Laundry(s): </p>

		<table class="ui black table">
			<thead>
				<tr>
					<th>Id</th>
					<th>Room</th>
					<th>Tanggal</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($laundry as $no => $row)
				<tr>
					<td>{{ $no+1 }}</td>
					<td>{{ $row->roomDetail->room->nama }}</td>
					<td>{{ $row->created_at }}</td>
					<td>{{ number_format($row->laundryDetail->sum('subtotal')) }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{-- <p align="right"><a href="{{ url('/admin/laporan/laundry') }}">Print</a></p> --}}
		<p align="right"><a href="#" onclick="modal_laundry()">Print</a></p>
	</div>

	{{-- Reservation Modal --}}
	<div class="ui modal reservation">
	  <i class="close icon"></i>
	  <div class="header">
	    Laporan Reservation Hotel
	  </div>
	  <div class="image content">
	    <div class="image">
	      Pilih Tanggal
	    </div>
	    <div class="description">
    	{!! Form::open(['url'=>'/admin/laporan/hotel', 'method'=>'post']) !!}
	      	<div class="ui input">
			  {{ Form::date('awal', Carbon\Carbon::now()) }}
			</div>
			-
			<div class="ui input">
			  {{ Form::date('akhir', Carbon\Carbon::now()) }}
			</div>
	    </div>
	  </div>
	  <div class="actions">
	    <div class="ui button">Cancel</div>
	    {!! Form::submit('OK', ['class'=>'ui button']) !!}
	  </div>
		{!! Form::close() !!}
	</div>

	{{-- Meeting Room Modal --}}
	<div class="ui modal meetingroom">
	  <i class="close icon"></i>
	  <div class="header">
	    Laporan Meeting Room
	  </div>
	  <div class="image content">
	    <div class="image">
	      Pilih Tanggal
	    </div>
	    <div class="description">
	    {!! Form::open(['url'=>'/admin/laporan/meeting', 'method'=>'post']) !!}
	      	<div class="ui input">
			  {{ Form::date('awal', Carbon\Carbon::now()) }}
			</div>
			-
			<div class="ui input">
			  {{ Form::date('akhir', Carbon\Carbon::now()) }}
			</div>
	    </div>
	  </div>
	  <div class="actions">
	    <div class="ui button">Cancel</div>
	    {!! Form::submit('OK', ['class'=>'ui button']) !!}
	  </div>
		{!! Form::close() !!}
	</div>

	{{-- Resto Modal --}}
	<div class="ui modal resto">
	  <i class="close icon"></i>
	  <div class="header">
	    Laporan Resto
	  </div>
	  <div class="image content">
	    <div class="image">
	      Pilih Tanggal
	    </div>
	    <div class="description">
	    {!! Form::open(['url'=>'/admin/laporan/resto', 'method'=>'post']) !!}
	      	<div class="ui input">
			  {{ Form::date('awal', Carbon\Carbon::now()) }}
			</div>
			-
			<div class="ui input">
			  {{ Form::date('akhir', Carbon\Carbon::now()) }}
			</div>
	    </div>
	  </div>
	  <div class="actions">
	    <div class="ui button">Cancel</div>
	    {!! Form::submit('OK', ['class'=>'ui button']) !!}
	  </div>
		{!! Form::close() !!}
	</div>

	{{-- Laundry Modal --}}
	<div class="ui modal laundry">
	  <i class="close icon"></i>
	  <div class="header">
	    Laporan Laundry
	  </div>
	  <div class="image content">
	    <div class="image">
	      Pilih Tanggal
	    </div>
	    <div class="description">
	    {!! Form::open(['url'=>'/admin/laporan/laundry', 'method'=>'post']) !!}
	      	<div class="ui input">
			  {{ Form::date('awal', Carbon\Carbon::now()) }}
			</div>
			-
			<div class="ui input">
			  {{ Form::date('akhir', Carbon\Carbon::now()) }}
			</div>
	    </div>
	  </div>
	  <div class="actions">
	    <div class="ui button">Cancel</div>
	    {!! Form::submit('OK', ['class'=>'ui button']) !!}
	  </div>
		{!! Form::close() !!}
	</div>



@stop

@push('scripts')
	<script type="text/javascript">

		function modal_reservation() {
			$('.ui.modal.reservation')
			  .modal('show')
			;
		}

		function modal_meetingroom() {
			$('.ui.modal.meetingroom')
			  .modal('show')
			;
		}

		function modal_resto() {
			$('.ui.modal.resto')
			  .modal('show')
			;
		}

		function modal_laundry() {
			$('.ui.modal.laundry')
			  .modal('show')
			;
		}

	</script>
@endpush