<!DOCTYPE html>
<html>
<head>
	<title>Lodaya | Admin</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	{{ Html::style('semantic/semantic.min.css') }}

	<style>
		.pusher {
			padding-top:80px;
		}

	</style>

</head>
<body>

	<div class="ui sidebar vertical left inverted labeled icon menu">

		@if (Auth::user()->name == 'admin')
			<a href="{{ url('/admin/dashboard') }}" class="item {{ $dashboard or '' }}"><i class="dashboard icon"></i>Dashboard</a>
			<a href="{{ url('/admin/kelas') }}" class="item {{ $kelas or '' }}"><i class="star icon"></i>Class</a>
			<a href="{{ url('/admin/room') }}" class="item {{ $room or '' }}"><i class="hotel icon"></i>Room</a>
			<a href="{{ url('/admin/news') }}" class="item {{ $news or '' }}"><i class="newspaper icon"></i>News</a>
			<a href="{{ url('/admin/meeting') }}" class="item {{ $meeting or '' }}"><i class="calendar icon"></i>Meeting</a>
			<a href="{{ url('/admin/resto') }}" class="item {{ $resto or '' }}"><i class="food icon"></i>Resto</a>
			<a href="{{ url('/admin/laundry') }}" class="item {{ $laundry or '' }}"><i class="leaf icon"></i>Laundry</a>
		@elseif(Auth::user()->name == 'petugas')
			<a href="{{ url('/admin/room') }}" class="item {{ $room or '' }}"><i class="hotel icon"></i>Room</a>
			<a href="{{ url('/admin/news') }}" class="item {{ $news or '' }}"><i class="newspaper icon"></i>News</a>
			<a href="{{ url('/admin/meeting') }}" class="item {{ $meeting or '' }}"><i class="calendar icon"></i>Meeting</a>
		@elseif(Auth::user()->name == 'laundry')
			<a href="{{ url('/admin/laundry') }}" class="item {{ $laundry or '' }}"><i class="leaf icon"></i>Laundry</a>
		@elseif(Auth::user()->name == 'resto')
			<a href="{{ url('/admin/resto') }}" class="item {{ $resto or '' }}"><i class="food icon"></i>Resto</a>
		@endif

		{{-- <a href="javascript:void(0)" onclick="alert('coming soon')" class="item {{ $linkactive  or '' }}"><i class="announcement icon"></i>Promo</a>
		<a href="javascript:void(0)" onclick="alert('coming soon')" class="item {{ $linkactive  or '' }}"><i class="info icon"></i>About</a>
		<a href="javascript:void(0)" onclick="alert('coming soon')" class="item {{ $linkactive  or '' }}"><i class="user icon"></i>Contact Us</a> --}}
	</div>

	<div class="ui basic labeled icon top fixed menu transitionheader">
		<a id="toggle" class="item">
			<i class="sidebar icon"></i>
			Menu
		</a>
		@yield('submenu', '')
		<a href="javascript:void(0)" onclick="window.location.reload()" class="right item"><i class="refresh icon"></i>Reload</a>
		<a href="{{ url('/logout') }}" class="item"><i class="sign out icon"></i>Logout</a>
		<a href="{{ url('/') }}" class="item"><i class="home icon"></i>ADMIN LODAYA HOTEL</a>
		
	</div>
	
	<div class="pusher transition">
		<div class="ui container">
			@yield('content', 'default')
		</div>
	</div>

	{{ Html::script('js/jquery-3.1.1.min.js') }}
	{{ Html::script('semantic/semantic.min.js') }}
	

	<script>
		$('#toggle').click(function() {
			$('.ui.sidebar').sidebar('toggle');
		});
		$('.ui.dropdown').dropdown();
		$('.transition')
		  .transition('fade up', '50ms')
		  .transition('fade up')
		;

		$('.transitionheader')
		  .transition('fade up', '50ms')
		  .transition('fade')
		;

		// $('table').tablesort();
		$('.ui.checkbox').checkbox();
		
	</script>

	@stack('scripts')

</body>
</html>
