@extends('frontend')

@section('banner')
	@include('banner', ['some' => 'data'])
@stop

@section('content')
	<div class="ui vertical stripe segment">
	    <div class="ui middle aligned stackable grid container">
	      <div class="row">
	        <div class="eight wide column">
	          <h3 class="ui header">About Lodaya</h3>
	          <p>Lodaya Hotel Bandung menawarkan penginapan modern yang terjangkau dan kemudahan akses ke berbagai destinasi belanja di Bandung.</p>
	          <h3 class="ui header">Kenyamanan Hotel</h3>
	          <p>Masing-masing kamar di Lodaya Hotel Bandung dilengkapi dengan AC, TV, brankas pribadi, dan dihiasi dengan interior dari kayu yang modern. Kamar mandi hotel memiliki fasilitas shower, perlengkapan mandi gratis, dan peralatan mandi. Akses Wi-Fi dapat dinikmati secara gratis dalam setiap kamar dan area-area publik.</p>
	        </div>
	        <div class="six wide right floated column">
	          <img src="{{ asset('superior.jpg') }}" class="ui huge image">
	        </div>
	      </div>
	      <div class="row">
	        <div class="center aligned column">
	          <a href="{{ url('/room') }}" class="ui huge button">Check Them Out</a>
	        </div>
	      </div>
		</div>
	</div>

	<div class="ui vertical stripe quote segment">
		<div class="ui equal width stackable internally celled grid">
		  <div class="center aligned row">
		    <div class="column">
		      <h3>"What a Company"</h3>
		      <p>That is what they all say about us</p>
		    </div>
		    <div class="column">
		      <h3>"I shouldn't have gone with their competitor."</h3>
		      <p>
		        <img src="{{ asset('nan.png') }}" class="ui avatar image"> <b>Nan</b> Chief Fun Officer Acme Toys
		      </p>
		    </div>
		  </div>
		</div>
	</div>

	<!-- Place somewhere in the <body> of your page -->
	<div class="flexslider">
	  <ul class="slides ui cards">
	    <li>
	      <img class="ui card" src="1.jpg" />
	    </li>
	    <li>
	      <img class="ui card" src="2.jpg" />
	    </li>
	    <li>
	      <img class="ui card" src="3.jpg" />
	    </li>
	    <li>
	      <img class="ui card" src="4.jpg" />
	    </li>
	    <li>
	      <img class="ui card" src="5.jpg" />
	    </li>
	    <li>
	      <img class="ui card" src="6.jpg" />
	    </li>
	    <li>
	      <img class="ui card" src="7.jpg" />
	    </li>
	    <li>
	      <img class="ui card" src="8.jpg" />
	    </li>
	    <li>
	      <img class="ui card" src="9.jpg" />
	    </li>
	    <!-- items mirrored twice, total of 12 -->
	  </ul>
	</div>

	<div class="ui vertical stripe segment">
	    <div class="ui text container">
	    	@forelse (App\News::all() as $row)
				<h3 class="ui header">{!! $row->title !!}</h3>
				{!! $row->deskripsi !!}
				<a class="ui large button">Read More</a>
				@if (!$loop->last)
				<h4 class="ui horizontal header divider">
				<a href="#">Case Studies</a>
				</h4>
				@endif
			@empty
				<p>Make some news</p>
	    	@endforelse
		</div>
	</div>

@stop
