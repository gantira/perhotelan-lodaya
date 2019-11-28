@extends('admin', ['laundry'=>'active'])

@section('submenu')
    <a href="{{ url('/admin/laundry/setting') }}" class="ui item"><i class="edit icon"></i>Setting</a>
@stop

@section('content')
    
	<div class="ui header">
		<u>Setting</u>
	</div>

	<table class="ui table">
		<thead>
			<tr>
				
				<th>Jenis Pakaian</th>
				<th>Harga Satuan</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($setting as $row)
			<tr>
				<td>{{ $row->jenis }}</td>
				<td>{{ $row->harga }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	
	<br>
	<br>
	<br>
	<br>

	<div class="ui form">
	{!! Form::open(['url'=>'admin/laundry', 'method'=>'post']) !!} 

		<div class="two fields">
			<div class="field">
				<label>Jenis Pakaian</label>
				{!! Form::text('jenis', null, ['placeholder'=>'Jumlah Pakaian']) !!}
			</div>
			<div class="field">
				<label>Harga Satuan </label>
				{!! Form::text('harga', null, ['placeholder'=>'Harga Satuan']) !!}
			</div>
		</div>
		{!! Form::submit('Send', ['class'=>'ui primary button']) !!}
	{!! Form::close() !!}
	</div>

@stop

@push('scripts')
	<script type="text/javascript">
		
	</script>
@endpush