<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>theTimes Camapigns</title>

	<link rel="stylesheet" href="{{ url() }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ url() }}/css/login_form.css">
	<!-- <link rel="stylesheet" href="{{ url() }}/bower_components/bootstrap-social/bootstrap-social.css"> -->
</head>
<body>


	
	 <div class="wrapper">
	    <form class="form-signin" method="POST" action="{{ url('/auth/login') }}">
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	      <h2 class="form-signin-heading text-center"><i class="glyphicon glyphicon-lock"></i> Sign In</h2>
	      <br>
	      	<div class="input-group">
	      		<div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
				<input type="text" class="form-control" name="email" placeholder="E-Mail" />
			</div>
			<br>
			<div class="input-group">
				<div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
				<input type="password" class="form-control" name="password" placeholder="Password" />
			</div>
	      	<br>
	      <button class="btn btn-sm btn-success btn-block" type="submit">SIGN IN</button>   
	    </form>
}
  	</div>

	
	<script type="text/javascript" src="{{ url() }}/js/jquery.min.js"></script>
	<script type="text/javascript" src="{{ url() }}/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ url() }}/js/custom.min.js"></script>
	
</body>
</html>