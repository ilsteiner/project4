<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CharDB - @yield('page','CharDB')</title>
	{{-- Includes bootstrap and other master styling, mixed down from multiple .sass files --}}
	<link rel="stylesheet" href="/css/CharDB.css">
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

	@include('auth.login');
	@include('auth.register');
<script src="/js/CharDB.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/custom.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>