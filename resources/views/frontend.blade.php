<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lodaya Hotel</title>

    {{ Html::style('semantic/semantic.min.css') }}
    {{ Html::style('flexslider/flexslider.css') }}

    <style type="text/css">
	    .logo {
	    	font-family: "Hotel";
	    }

	    body {
	    	background-color: ;
	    }

	    .cover {
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    background-size: cover;
		    -o-background-size: cover;
		    background-image: url('{{ asset('psx.jpg') }}');
		    
	    }

	    .hidden.menu {
	      display: none;
	    }

	    .masthead.segment {
	      min-height: 700px;
	      padding: 1em 0em;
	    }
	    .masthead .logo.item img {
	      margin-right: 1em;
	    }
	    .masthead .ui.menu .ui.button {
	      margin-left: 0.5em;
	    }
	    .masthead h1.ui.header {
	      margin-top: 3em;
	      margin-bottom: 0em;
	      font-size: 4em;
	      font-weight: normal;
	    }
	    .masthead h2 {
	      font-size: 1.7em;
	      font-weight: normal;
	    }

	    .ui.vertical.stripe {
	      padding: 8em 0em;
	    }
	    .ui.vertical.stripe h3 {
	      font-size: 2em;
	    }
	    .ui.vertical.stripe .button + h3,
	    .ui.vertical.stripe p + h3 {
	      margin-top: 3em;
	    }
	    .ui.vertical.stripe .floated.image {
	      clear: both;
	    }
	    .ui.vertical.stripe p {
	      font-size: 1.33em;
	    }
	    .ui.vertical.stripe .horizontal.divider {
	      margin: 3em 0em;
	    }

	    .quote.stripe.segment {
	      padding: 0em;
	    }
	    .quote.stripe.segment .grid .column {
	      padding-top: 5em;
	      padding-bottom: 5em;
	    }

	    .footer.segment {
	      padding: 5em 0em;
	    }

	    .secondary.pointing.menu .toc.item {
	      display: none;
	    }

	    @media only screen and (max-width: 700px) {
	      .ui.fixed.menu {
	        display: none !important;
	      }
	      .secondary.pointing.menu .item,
	      .secondary.pointing.menu .menu {
	        display: none;
	      }
	      .secondary.pointing.menu .toc.item {
	        display: block;
	      }
	      .masthead.segment {
	        min-height: 350px;
	      }
	      .masthead h1.ui.header {
	        font-size: 2em;
	        margin-top: 1.5em;
	      }
	      .masthead h2 {
	        margin-top: 0.5em;
	        font-size: 1.5em;
	      }
	    }

    </style>

    @stack('style')
</head>

<body>

	<div class="ui inverted icon menu">
		<div class="ui container">
		  	<a class="item logo"><h1>Lodaya Hotel</h1></a>
		    <a href="{{ url('/') }}" class="item">Home </a>
		    <a href="{{ url('/room') }}" class="item">Hotel </a>
		    <a href="{{ url('/resto') }}" class="item">Resto </a>
		    <a href="{{ url('/meetingroom') }}" class="item">Meeting Room </a>
		    <div class="right item">
		    	<button class="ui inverted green button" onclick="login()">Log in</button>
		    </div>
		</div>
	</div>

	@yield('banner', '')

	<div class="pusher contentransition">
		@yield('content', 'default')
	</div>

	{{-- footer --}}
	<div class="ui inverted vertical footer segment">
	    <div class="ui container">
		    <div class="ui stackable inverted divided equal height stackable grid">
		        <div class="three wide column">
		          <h4 class="ui inverted header">About</h4>
		          <div class="ui inverted link list">
		            <a href="#" class="item">Sitemap</a>
		            <a href="#" class="item">Contact Us</a>
		            <a href="#" class="item">Religious Ceremonies</a>
		            <a href="#" class="item">Gazebo Plans</a>
		          </div>
		        </div>
		        <div class="three wide column">
		          <h4 class="ui inverted header">Services</h4>
		          <div class="ui inverted link list">
		            <a href="#" class="item">Banana Pre-Order</a>
		            <a href="#" class="item">DNA FAQ</a>
		            <a href="#" class="item">How To Access</a>
		            <a href="#" class="item">Favorite X-Men</a>
		          </div>
		        </div>
		        <div class="seven wide column">
				    <h4 class="ui inverted header">Footer Header</h4>
				    <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
			    </div>
			</div>
		</div>
	</div>

	{{-- Login Modal --}}
	<div class="ui modal">
		<i class="close icon"></i>
		<div class="header">
			Please Login!
		</div>
		<div class="image content">
			<div class="ui medium image">
			  	<img src="{{ asset('1.jpg') }}">
			</div>
		<div class="description">
		<div class="ui header">Login untuk Petugas Lodaya Hotel</div>
		{{-- <p>We've grabbed the following image from the <a href="https://www.gravatar.com" target="_blank">gravatar</a> image associated with your registered e-mail address.</p> --}}
		<p>Input your username and password.</p>
		{{ Form::open(['url'=>'/login', 'method'=>'post']) }}
			<div class="ui form">
				<div class="two fields">
					<div class="field">
				      	<div class="ui left icon input">
				      		{{ Form::text('name', null, ['placeholder'=>'username']) }}
						  		<i class="user icon"></i>
						</div>
						</div>
						<div class="field">
							<div class="ui left icon input">
								{{ Form::password('password', ['placeholder'=>'password']) }}
							  <i class="privacy icon"></i>
							</div>
						</div>
				</div>
			</div>
		</div>
		</div>
		<div class="actions">
			<div class="ui black deny button">
			  	No
			</div>
			<button type="submit" class="ui right labeled icon green button">
		  		<i class="checkmark icon"></i>
		  		Log me in!
			</button>
			{{ Form::close() }}
		</div>
	</div>

  	{{ Html::script('js/jquery.js') }}
	{{ Html::script('flexslider/jquery.flexslider.js') }}
	{{ Html::script('semantic/semantic.min.js') }}

	<script>
		// Can also be used with $(document).ready()
		$(window).load(function() {
		  	$('.flexslider').flexslider({
			    animation: "slide",
			    animationLoop: true,
			    itemWidth: 210,
			    itemMargin: 3,
			    minItems: 2,
			    maxItems: 4,
		  	});
		});

		$('.transition')
		  	.transition('fade up', '50ms')
		  	.transition('horizontal flip', '550ms')
		;

		$('.contentransition')
		  	.transition('fade up', '50ms')
		 	.transition('fade up', '1000ms')
		;

		function login() {
		 	$('.ui.modal').modal('show');
		}

		$('select.dropdown')
		  .dropdown()
		;

	</script>

	@stack('scripts')



</body>

</html>
