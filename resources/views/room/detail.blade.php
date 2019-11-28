@extends('admin', ['room'=>'active'])

@section('content')
    <div class="ui form">
        <div>
            <h1>Room Number</h1>
            <div class="ui breadcrumb">
				<a class="section">Menu</a>
				<div class="divider"> / </div>
				<a class="section">Room Number</a>
            </div>
        </div>
    </div>
    
    <div class="ui divider"></div>

	<div class="ui circular labels">
		@if (is_null($reservation))
			No data found
		@else
			<div class="ui circular massive labels">
				<h3>Filled Room</h3>
					@foreach ($reservation as $row)
						<a class="ui label {{ $row->roomDetail->no }}" data-title="{{ $row->customer->first_name }} {{ $row->customer->last_name }} # In {{ $row->checkin }} # Out {{ $row->checkout }} # {{ $row->roomDetail->room->nama }} Room" onclick="checkout({{$row->roomDetail->no}})">
							{{ $row->roomDetail->no }}
						</a>
					@endforeach
			</div>

			<div class="ui circular massive labels">
				<h3>Empty Room</h3>
				@foreach ($room->detail->where('status', 0) as $row)
					<a class="ui label" data-title="Empty">
						{{ $row->no }}
					</a>
				@endforeach
			</div>
		@endif
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
		function checkout(id) {
			document.getElementById("room").innerHTML = id;

			$('.ui.basic.modal')
			  .modal({
			    closable  : true,
			    onDeny    : function(){
				    window.alert('Wait not yet!');
				    return false;
			    },
			    onApprove : function() {
			      	
			      	var dataString = { 
		                no : id,
		                _token : '{{ csrf_token() }}'
		            };
		            
		            $.ajax({
		                url: "{{ URL('/admin/room/checkout') }}",
		                type: "post",
		                data: dataString,
		                dataType: "json",
		                cache: false,
		                success: function(data){
		                	window.alert('Exit!');
			      			window.location.assign('{{ url('admin/room/struk') }}/'+data.room_detail_id);

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
