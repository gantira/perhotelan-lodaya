@extends('admin', ['laundry'=>'active'])

@section('submenu')
    <a href="{{ url('/admin/laundry/setting') }}" class="ui item"><i class="edit icon"></i>Setting</a>
@stop

@section('content')
    
	<div class="ui header">
		<u>Laundry</u>
	</div>
	
	<div class="ui form">
	{!! Form::open(['url'=>'admin/laundry/selesai', 'method'=>'post']) !!}
	
		<div class="three fields">
			<div class="ui field">
					<label>Room</label>
					{!! Form::select('room_detail_id', $room, null, ['placeholder'=>'Pilih Room', 'required', 'onchange' => 'reservation(this.value)']) !!}
			</div>
			<div class="ui field">
					<label>Tanggal Selesai</label>
					{!! Form::date('tanggal_selesai', \Carbon\Carbon::now(), []) !!}
			</div>
			<div class="ui field">
					<label>Jam Selesai</label>
					{{ Form::time('jam_selesai', null, ['required']) }}
			</div>

			{!! Form::hidden('reservation_id', null, ['id' => 'reservation_id']) !!}
		</div>

		<hr>
		<br>

		<div class="two fields">
			<div class="field">
				<label>Jumlah</label>
				{!! Form::number('jumlah', null, ['placeholder'=>'Jumlah Pakaian' ,'id' => 'jumlah']) !!}
			</div>
			<div class="field">
				<label>Jenis </label>
				{!! Form::select('jenis', $jenis, null, ['placeholder'=>'-=Jenis Pakaian=-', 'id' => 'jenis', 'onchange'=>'cekharga()']) !!}
			</div>
		</div>

		<div class="ui fields">
			<div class="field">
				<label>Harga Satuan</label>
				{!! Form::text('harga', null, ['placeholder'=>'Harga Satuan', 'id'=>'harga']) !!}
			</div>
			<div class="field">
				<label>Total Bayar</label>
				{!! Form::text('total', null, ['placeholder'=>'Total Pembayaran' ,'id' => 'total']) !!}
			</div>
		</div>

		<button class="ui teal button" onclick="tambah(event)">Add</button>
	
	</div>

	<table class="ui table">
		<thead>
			<th>Jenis</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>subtotal</th>
		</thead>
		@foreach ($laundrytemp as $row)
			<tr>
				<td>{{ $row->laundrysetting->jenis }}</td>
				<td>{{ $row->jumlah }}</td>
				<td>{{ $row->harga }}</td>
				<td>{{ $row->subtotal }}</td>
			</tr>
		@endforeach
		<tfoot>
			<tr>
				<td colspan="3" align="center">GRAND TOTAL</td>
				<td>{{ $laundrytemp->sum('subtotal') }}</td>
			</tr>
		</tfoot>
	</table>

	<div>
		{!! Form::submit('Finish', ['class'=>'ui red button']) !!}
	</div>

	{!! Form::close() !!}

@stop

@push('scripts')
	<script type="text/javascript">

		function cekharga() {
			var dataString = { 
                jenis_id : $('#jenis').val(),
                _token : '{{ csrf_token() }}'
            };
            
            $.ajax({
                url: "{{ URL('/admin/laundry/harga') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                	document.getElementById("harga").value = data.harga;
                	document.getElementById("total").value = $('#jumlah').val() * $('#harga').val();

                    console.log(data);
                },
                error: function(data){
                	document.getElementById("harga").value = 0;
                	document.getElementById("total").value = $('#jumlah').val() * $('#harga').val();
                    console.log(data);
                }
            });
		}

		function tambah(event) {
			event.preventDefault()

			var dataString = { 
                jumlah : $('#jumlah').val(),
                jenis : $('#jenis').val(),
                harga : $('#harga').val(),
                subtotal : $('#total').val(),
                _token : '{{ csrf_token() }}'
            };
            
            $.ajax({
                url: "{{ URL('/admin/laundry/tambah') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                	window.location.reload();

                    console.log(data);
                },
                error: function(data){
                	alert('Gagal Tambah');
                    console.log(data);
                }
            });
		}

		function reservation(val) {
			var dataString = { 
                room_id : val,
                _token : '{{ csrf_token() }}'
            };
            
            $.ajax({
                url: "{{ URL('/admin/laundry/customer') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                	document.getElementById("reservation_id").value = data.id;

                    console.log(data);
                }
            });
		}

	</script>
@endpush