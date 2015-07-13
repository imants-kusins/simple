@extends('master')

@section('content')

	<div class="container">
		
		<div class="row col-md-12">
				
				<!-- top bit -->

				<h2 class="pull-left">Create New Campaign</h2>

				<div class="top-btn-container pull-right">
					<a class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
				</div>

		</div>

		<div class="row col-md-12">
			
		<form method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>

		</div>

	</div>

@stop