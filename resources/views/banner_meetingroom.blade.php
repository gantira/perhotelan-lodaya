	<div class="cover">
		<div class="ui container">
			<div class="row">
				<div class="ui form column grid">
				  <div class="field transition" style="background-color: rgba(40, 0, 0, 0.3); padding: 10px;">
				  	<p></p>
				    <h1 style="background-color: rgba(250, 250, 250, 0.3)">Cek Availability</h1>
				    {{ Form::open(['url'=>'reservasi/meeting', 'method'=>'post']) }}
				  	<div class="four column row">
				  		@if($errors->any())
							<h4><font style="color: red"> {{ $errors->first() }}</font></h4>
						@endif
						
				   	 	<div class="column">
				   	 		<label><font color="white">CHECK IN</font></label>
				   	 		{{ Form::date('checkin', Carbon\Carbon::now()) }}
				   	 	</div>
				   	 	<div class="column">
				   	 		<label><font color="white">HOUR</font></label>
				   	 		{{ Form::time('jam', null, ['required']) }}
				   	 	</div>
				   	 	<br>
				   	 	<div class="column">
				   	 		<label><font color="white">MEETING ROOM</font></label>
				   	 		{{ Form::select('meetingroom_id', App\Meeting::where('status', 0)->pluck('nama', 'id'), null, ['required']) }}
						</div>
						<br>
				   	 	<div class="column">
				   	 		<button class="ui inverted basic button">Submit</button>
				   	 	</div>
				  	</div>
				  	{{ Form::close() }}
					<br>
					<br>
				  </div>
				</div>
			</div>
		</div>
	</div>