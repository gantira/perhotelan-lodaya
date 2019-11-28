			<div class="two fields">
				<div class="field">
					<label>Room Type</label>
					{!! Form::text('nama', null, ['placeholder'=>'Nama']) !!}
				</div>
				<div class="field">
					<label>Jumlah Room</label>
					{!! Form::number('qty', null, ['placeholder'=>'']) !!}
				</div>
			</div>

			<div class="ui fields">
				<div class="field">
					<label>Weekday</label>
					{!! Form::text('weekday', null, ['placeholder'=>'Harga']) !!}
				</div>
				<div class="field">
					<label>Weekend</label>
					{!! Form::text('weekend', null, ['placeholder'=>'Harga']) !!}
				</div>
			</div>

			<div class="field">
				<label>Feature Image (thumbnails)</label>
				{!! Form::file('photo', ['required']) !!}
			</div>

			<div class="field">
				<label>Fasilitas</label>
				<div class="ui fluid multiple search selection dropdown">
					{!! Form::hidden('fasilitas') !!}
					<i class="dropdown icon"></i>
					<div class="default text"></div>
					<div class="menu">
						<div class="item" data-value="<i class='add user icon'></i>Service Plus"><i class="add user icon"></i>Service Plus</div>
						<div class="item" data-value="<i class='tv icon'></i>TV"><i class="tv icon"></i>TV</div>
						<div class="item" data-value="<i class='food icon'></i>Breakfast"><i class="food icon"></i>Breakfast</div>
						<div class="item" data-value="<i class='wifi icon'></i>Free Wifi"><i class="wifi icon"></i>Free Wifi</div>
						<div class="item" data-value="<i class='game icon'></i>Video Game"><i class="game icon"></i>Video Game</div>
					</div>
				</div>
			</div>
			
			<div class="field">
				<label>Deskripsi</label>
				{!! Form::textarea('deskripsi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ['id'=>'editor']) !!}
			</div>
			{!! Form::submit($button, ['class'=>'ui primary button']) !!}
		