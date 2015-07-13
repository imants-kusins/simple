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



	<div class="campaign-create-form-container">
			
		<form method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<!-- form content -->

				<div class="row col-md-8">
					<div class="form-group">
						<label>Campaign Name:</label>
						<input type="text" name="campaign_name" value="" class="form-control" />
					</div>
				</div>

				
				<div class="row col-md-8">
					<div class="form-group">
						<label>Inbox Phone Number:</label>
						<input type="text" name="campaign_phone_number" value="" class="form-control" />
					</div>
				</div>

				

			<!-- // -->

		</form>


	</div>

@stop