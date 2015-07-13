<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Eskimo</title>

	<link rel="stylesheet" href="{{ url() }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ url() }}/css/custom.min.css">
	<link rel="stylesheet" href="{{ url() }}/bower_components/bootstrap-social/bootstrap-social.css">
</head>
<body>



	@include('public.partials.header')


	
	<div id="page-content-wrapper">
		@yield('content')
	</div>

	


	@include('public.partials.footer')


	
	<script type="text/javascript" src="{{ url() }}/js/jquery.min.js"></script>
	<script type="text/javascript" src="{{ url() }}/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ url() }}/js/custom.min.js"></script>
	
</body>
</html>