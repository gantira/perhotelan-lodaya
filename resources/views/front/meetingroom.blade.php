@extends('frontend')

@section('banner')
	@include('banner_meetingroom', ['some' => 'data'])
@stop

@section('content')
<br>
	<br>
		<br>
		<div class="ui container">
			

	      	{{-- @if ($meetingroom->where('type', 'Meeting Package'))
		      	
		      	<h2 class="ui horizontal divider header">
					Meeting Package
				</h2>

		      	<div class="ui five cards">

					@forelse ($meetingroom->where('type', 'Meeting Package') as $row)
					<div class="card">
					  <div class="content">
					    <div class="header">{{ $row->nama}}</div>
					    <div class="description">
					      <p>{!! $row->deskripsi !!}</p>
					    </div>
					  </div>
					  <div class="extra content">
					    
					  </div>
					</div>
					@empty
					<div class="ui container">
						<p>No item found</p>
					</div>
					@endforelse

				</div>
	      	@endif --}}

	      	@if ($meetingroom->where('type', 'Meeting Room'))
	      		
				<h2 class="ui horizontal divider header">
					Meeting Room
				</h2>
				
				<div class="ui five cards">

					@forelse ($meetingroom->where('type', 'Meeting Room') as $row)
					<div class="card">
					  <div class="content">
					    <div class="header">{{ $row->nama}}</div>
					    <div class="description">
					      <p>{!! $row->deskripsi !!}</p>
					    </div>
					  </div>
					  <div class="extra content">
					   
					  </div>
					</div>
					@empty
					<div class="ui container">
						<p>No item found</p>
					</div>
					@endforelse

				</div>
	      	@endif


		</div>
		<br>
	<br>
<br>
@stop

@push('scripts')
	<script type="text/javascript">
		$('.rating').rating('disable');

	</script>
@endpush