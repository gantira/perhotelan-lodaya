@extends('admin', ['meeting'=>'active'])

@section('submenu')
	<a href="{{ url('/admin/meeting/create') }}" class="ui item"><i class="edit icon"></i>New</a>
@stop

@section('content')
    
	<div class="ui header">
		<u>MEETING PACKAGES</u>
	</div>
	
	<div class="ui five cards">

		@forelse ($meeting->where('type', 'Meeting Package') as $row)
		<div class="card">
		  <div class="content">
		    <div class="header">{{ $row->nama}}</div>
		    <h4 class="ui sub header">Rp {{ $row->harga }} / pax</h4>
		    <div class="description">
		      <p>{!! $row->deskripsi !!}</p>
		    </div>
		  </div>
		  <div class="extra content">
		     <span class="left floated edit">
		      <i class="edit icon"></i>
		      Edit
		    </span>
		    <span class="right floated edit">
			    @if ($row->status)
			    	<a href="#" onclick="checkout({{$row->id}}, '{{$row->nama}}')">
				      	<i class="user red icon"></i>
					</a>
			    @else
			    	<i class="user green icon"></i>
			    @endif
		    </span>
		  </div>
		</div>
		@empty
		<div class="ui container">
			<p>No data Found</p>
		</div>
		@endforelse

	</div>

	<div class="ui header">
		<u>MEETING ROOM</u>
	</div>
	
	<div class="ui five cards">

		@forelse ($meeting->where('type', 'Meeting Room') as $row)
		<div class="card">
		  <div class="content">
		    <div class="header">{{ $row->nama}}</div>
		    <h4 class="ui sub header">Rp {{ $row->harga }}</h4>
		    <div class="description">
		      <p>{!! $row->deskripsi !!}</p>
		    </div>
		  </div>
		  <div class="extra content">
		    <span class="left floated edit">
		      <i class="edit icon"></i>
		      Edit
		    </span>
		    <span class="right floated edit">
		      @if ($row->status)
		      	<a href="#" onclick="checkout({{$row->id}}, '{{$row->nama}}')">
			      	<i class="user red icon"></i>
			    </a>
		      @else
		      	<i class="user green icon"></i>
		      @endif
		    </span>
		  </div>
		</div>
		@empty
		<div class="ui container">
			<p>No data Found</p>
		</div>
		@endforelse

	</div>


	{{-- Modal --}}
	<div class="ui basic modal">
	  <i class="close icon"></i>
	  <div class="header">
	    Room
	  </div>
	  <div class="image content">
	    <div class="image">
	      <i class="icon" id="room"></i>
	    </div>
	    <div class="description">
	      <p>Want to exit the room?</p>
	    </div>
	  </div>
	  <div class="actions">
	    <div class="two fluid ui inverted buttons">
	      <div class="ui cancel red basic inverted button">
	        <i class="remove icon"></i>
	        No
	      </div>
	      <div class="ui ok green basic inverted button">
	        <i class="checkmark icon"></i>
	        Yes
	      </div>
	    </div>
	  </div>
	</div>


@stop

@push('scripts')
	<script type="text/javascript">
		function checkout(id, nama) {
			document.getElementById("room").innerHTML = nama;

			$('.ui.basic.modal')
			  .modal({
			    closable  : true,
			    onDeny    : function(){
				    window.alert('Wait not yet!');
				    return false;
			    },
			    onApprove : function() {
			      	
			      	var dataString = { 
		                id : id,
		                _token : '{{ csrf_token() }}'
		            };
		            
		            $.ajax({
		                url: "{{ URL('/meeting/reservasi/chekcout') }}",
		                type: "post",
		                data: dataString,
		                dataType: "json",
		                cache: false,
		                success: function(data){
		                	window.alert('Exit!');
			      			window.location.reload();

		                    console.log(data);
		                }
		            });
			    }
			  })
			  .modal('setting', 'transition', 'horizontal flip')
			  .modal('show')
			;
		}

		$('.ui.label')
		  .popup()
		;
	</script>
@endpush
