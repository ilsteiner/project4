<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CharDB - @yield('page','CharDB')</title>
	{{-- Includes bootstrap and other master styling, mixed down from multiple .sass files --}}
	<link rel="stylesheet" href="/css/CharDB.css">

	{{-- Favicon stuff, built using realfavicongenerator.net --}}
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=3">
	<link rel="icon" type="image/png" href="/favicon-32x32.png?v=3" sizes="32x32">
	<link rel="icon" type="image/png" href="/favicon-16x16.png?v=3" sizes="16x16">
	<link rel="manifest" href="/manifest.json?v=3">
	<link rel="mask-icon" href="/safari-pinned-tab.svg?v=3" color="#5bbad5">
	<link rel="shortcut icon" href="/favicon.ico?v=3">
	<meta name="apple-mobile-web-app-title" content="CharDB">
	<meta name="application-name" content="CharDB">
	<meta name="theme-color" content="#000000">

	@yield('head')
</head>
<body>
	<div id="wrapper">
		@include('layouts.navigation')
		<div id="page-content-wrapper">
			<div class="container-fluid">
				@if(Session::has('success'))
					<div class="row">
						<div class="col-xs-12">
							<div class="alert alert-success" role="alert">
								{{ session('success') }}
							</div>
						</div>
					</div>
				@endif
				@if(Session::has('success2'))
					<div class="row">
						<div class="col-xs-12">
							<div class="alert alert-success" role="alert">
								{{ session('success2') }}
							</div>
						</div>
					</div>
				@endif
				@yield('content')
			</div>
		</div>
	</div>

	@include('auth.loginModal');
	@include('auth.register');
<script src="/js/CharDB.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/custom.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>