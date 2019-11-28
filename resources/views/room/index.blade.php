@extends('admin', ['room'=>'active'])

@section('submenu')
    <a href="{{ url('/admin/bed') }}" class="ui item"><i class="hotel icon"></i>ExtraBed</a>
@stop

@section('content')
    <div class="ui form">
        <h1>Room Hotel</h1>
        <div class="ui breadcrumb">
			<a class="section">Menu</a>
			<div class="divider"> / </div>
			<a class="section">Room Hotel</a>
        </div>
    </div>
    
    <div class="ui divider"></div>
    
	@if (!count($room))
		No item found
	@endif

	<div class="ui four cards">

		@foreach ($room as $row)
	  		<a class="card {{ $row->id }}">

	  			<div class="ui dimmer {{ $row->id }}">
	    			<div class="ui text loader">Loading</div>
	    		</div>

		  		<div class="content">
			  		<div class="header">
			  			{{ $row->nama }}
			  		</div>
		  		</div>	
		    	<div class="image">
			      	<img class="ui image" src="{{ asset($row->thumbnail) }}">
			    </div>

		    	<div class="extra">
					Rating:
					<div class="ui star rating" id="rating" data-rating="{{ $row->rating }}" data-max-rating="5"></div>
			    </div>

			    <div class="extra content">
				    <div class="ui form {{ $row->id }}">
			{{-- 	    	<div class="two fields">
				    		<div class="field">
						    	<div class="ui small input">
				    				<label>Room</label>
								</div>
				    		</div>
				    		<div class="field">
						    	<div class="ui small input">
								  	<input type="text" data-content="Isi jumlah room"  placeholder="jumlah Room" id="qty{{ $row->id }}" value="{{ $row->qty }}">
								</div>
				    		</div>
				    	</div> --}}
				    	<div class="ui two column centered grid">
						  <div class="four column centered row">
						    <div class="column">
						    	<div class="ui statistic">
							    	<div class="statistic" data-content="{{ $row->detail->where('status', 1)->count() }} Room Terisi" onclick="window.location.assign('{{ url('admin/room/'.$row->id.'/detail') }}')">
									    <div class="value">
									      	<i class="home icon"></i> 
									      	{{ $row->detail->where('status', 1)->count() }}
									    </div>
									    <div class="label">
									      	Filled
						    			</div>
								    </div>
								</div>
						    </div>
						    <div class="column">
						    	<div class="ui statistic">
							    	<div class="statistic" data-content="{{ $row->detail->where('status', 0)->count() }} Room Kosong" onclick="window.location.assign('{{ url('admin/room/'.$row->id.'/detail') }}')">
									    <div class="value">
									      	<i class="home icon"></i>
									      	{{ $row->detail->where('status', 0)->count() }}
									    </div>
									    <div class="label">
										    Empty
						    			</div>
								    </div>
								</div>
						    </div>
						  </div>
						</div>
				    </div>
			    </div>
			    <div class="ui three bottom attached buttons">
			    	<div class="ui button" onclick="save({{ $row->id }})">Save</div>
			    	<div class="ui button" onclick="window.location.assign('{{ url('admin/room/'.$row->id.'/edit') }}')">Edit</div>
    				<div class="ui button" onclick="hapus({{ $row->id }})">Delete</div>
			    </div>
	  		</a>
		@endforeach
	</div>

@stop

@push('scripts')
	<script type="text/javascript">
		$('.rating').rating();
		$('.save').popup({
			position : 'right center',
			transition: 'fade'
		});

		var rating;
		$('.ui.rating')
			.rating('setting', 'onRate', function(value) {
			 	 rating = value;
		});

		function save(id){
			$('.dimmer.'+id).addClass('active');

            var dataString = { 
                room_id : id,
                rating : rating,
                qty : $('#qty'+id).val(),
                _token : '{{ csrf_token() }}'
            };
            
            $.ajax({
                url: "{{ URL('/admin/room/update') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                	setTimeout(function(){
				        $(".dimmer."+id).removeClass("active");
				        $(".card."+id).transition('pulse');
				    },1000);
                	
                    console.log(data);
                }
            });
		}

		function hapus(id) {
			var dataString = { 
                room_id : id,
                _token : '{{ csrf_token() }}'
            };
            
            $.ajax({
                url: "{{ URL('/admin/room/destroy') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                	$(".card."+id).transition('fly right');
                    console.log(data);
                }
            });

			
		}

		$('.transition .card')
			.transition()
          	.transition({
				animation : 'swing right',
				reverse   : false,
				interval  : 200
			})
        ;

        $('.field input')
		  	.popup({
		    	on: 'focus'
		  })
		;

		$('.statistic').popup();


	</script>
@endpush
