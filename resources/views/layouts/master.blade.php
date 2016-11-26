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
				@yield('content')
			</div>
		</div>
	</div>
<script src="/js/CharDB.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/custom.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>