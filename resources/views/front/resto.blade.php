@extends('frontend')

@section('banner')
	@include('banner', ['some' => 'data'])
@stop

@section('content')
<br>
	<br>
		<br>
		<div class="ui container">
			<h2 class="ui horizontal divider header">
				Resto
			</h2>
			
      		@forelse ($resto as $row)
		      	<div class="row" style="padding: 40px;">
		      		<div class="ui divided items">
					  <div class="item">
					    <div class="ui medium image">
					    	<div class="ui teal ribbon label">
						        <i class="food icon"></i> Resto
						    </div>
					      	<img class="ui circular rounded" src="{{ asset($row->thumbnail) }}">
					    </div>
					    <div class="content">
					      	<a class="header">{{ $row->nama }}</a>
					     	<div class="meta">
						        <span class="cinema"></span>
						    </div>
					      	<div class="cinema">
					        	{!! $row->deskripsi !!}
					     	</div>
							<div class="extra">
							{{-- <div class="ui tag label">{!! str_replace(',','&nbsp;&nbsp;&nbsp;',$row->fasilitas) !!}</div> --}}
								<div class="ui primary right floated animated button" tabindex="0">
								  	<div class="visible content">Read More</div>
								  	<div class="hidden content">
								    	<i class="right chevron icon"></i>
								  	</div>
								</div>
							</div>
					    </div>
					  </div>
					</div>
	      		</div>
	      	@empty
	      	<p>No item found</p>
	      	@endforelse

	      


		</div>
		<br>
	<br>
<br>
@stop

