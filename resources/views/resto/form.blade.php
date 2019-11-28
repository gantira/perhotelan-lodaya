			<div class="two fields">
				<div class="field">
					<label>Nama</label>
					{!! Form::text('nama', null, ['placeholder'=>'Nama']) !!}
				</div>
			</div>

			<div class="grouped fields">
			    <div class="field">
			    <label>Jenis</label>
			      <div class="ui radio checkbox">
			      	{{ Form::radio('jenis', 'Makanan', true) }}
		        	<label>Makanan</label>
			      </div>
			    </div>
			    <div class="field">
			      <div class="ui radio checkbox">
			      	{{ Form::radio('jenis', 'Minuman') }}
			        <label>Minuman</label>
			      </div>
			    </div>
			  </div>

			<div class="ui fields">
				<div class="field">
					<label>Harga</label>
					{!! Form::text('harga', null, ['placeholder'=>'Harga']) !!}
				</div>
			</div>

			<div class="field">
				<label>Feature Image (thumbnails)</label>
				{!! Form::file('thumbnail', null, []) !!}
			</div>
			
			<div class="field">
                    <label>Deskripsi</label>
                    {!! Form::textarea('deskripsi', null, ['id'=>'editor']) !!}
            </div>

			{!! Form::submit($button, ['class'=>'ui primary button']) !!}
		
