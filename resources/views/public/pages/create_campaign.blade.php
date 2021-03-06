@extends('master')

@section('content')

	<!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
		
		<div class="row col-md-12">
				
				<!-- top bit -->

				<h2 class="pull-left">Create New Campaign</h2>

				<div class="top-btn-container pull-right">
					@include('public.partials.logoutBtn')
				</div>

		</div>



	<div class="campaign-create-form-container">
			
		<form method="POST" action="{{ url() }}/save-campaign">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<!-- form content -->

					<div class="row"> 

						<div class="form-group col-md-10">
							<label>Campaign Name:</label>
							<input type="text" name="campaign_name" value="" class="form-control" />
						</div>

					
						<div class="form-group col-md-10">
							<label>Inbox Phone Number:</label>
							<input type="text" name="campaign_phone_number" value="" class="form-control" />
						</div>

						<div class="form-group col-md-10">
							<label>Inbox ID:</label>
							<input type="text" name="campaign_inbox_id" value="" class="form-control" />
						</div>

					</div> 

					<div class="row"> 
						<div class="form-group col-md-7">
							<label>Campaign Begins:</label>
							<div class="input-group">
								<input type="text" name="campaign_start_date" value="" class="form-control" />
								<div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
							</div>
						</div>

						<div class="form-group col-md-3">
							<!-- <label>Start Time:</label> -->
							<input type="text" name="campaign_start_time" value="" class="form-control no-label" />
						</div>
					</div>


					<div class="row">
						<div class="form-group col-md-7">
							<label>Campaign Ends:</label>
							<div class="input-group">
								<input type="text" name="campaign_end_date" value="" class="form-control" />
								<div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
							</div>
						</div>

						<div class="form-group col-md-3">
							<!-- <label>Start Time:</label> -->
							<input type="text" name="campaign_end_time" value="" class="form-control no-label" />
						</div>
					</div>

					<div class="row col-md-10">	
						<label>Accept Duplicate Entries?:</label>
					</div>
					
					<div class="col-md-10">
						<label class="radio-inline">
						  	<input type="radio" name="duplicateEntryYes" id="inlineRadio1" value="option1" class="pull-right"> Yes 
						</label>
						<label class="radio-inline">
						  	<input type="radio" name="duplicateEntryNo" id="inlineRadio2" value="option1" class="pull-left"> No
						</label>
					</div>
			
					<div class="row col-md-10">&nbsp;</div>

					<div class="row" id="keywordsRow"> 

						<div class="form-group col-md-8" id="keyword_container_1">
							<label>Keyword #1:</label>
							<input type="text" name="campaign_keyword_1" value="" class="form-control" />
						</div>

					</div>

					<div class="row col-md-10">
						<button id="addKeywordBtn" type="button" class="btn btn-sm btn-primary pull-left">
							<i class="glyphicon glyphicon-plus"></i> Add Keyword
						</button>
					</div>
			
					<div class="row col-md-10">&nbsp;</div>
					<!-- submit for button -->

					<div class="row">
						<div class="col-md-10">
							<button type="submit" class="btn btn-sm btn-success btn-block"><i class="glyphicon glyphicon-ok"></i> Save Campaign</button>
						</div>
					</div>


					<div class="row col-md-10">&nbsp;</div>

			<!-- // -->

		</form>


	</div>

	</div>

@stop