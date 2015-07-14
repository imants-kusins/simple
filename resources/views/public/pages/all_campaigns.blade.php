@extends('master')

@section('content')



        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
					
					<!-- top bit -->

					<h2 class="pull-left">All Campaigns</h2>

					<div class="top-btn-container pull-right">
						<a class="btn btn-sm btn-primary" href="{{ url() }}/create-campaign"><i class="glyphicon glyphicon-plus"></i> Add Campaign</a>
						@include('public.partials.logoutBtn')
					</div>
					

			</div>
		</div>


		<div class="content-container">
		
			<div class="row">
				<div class="col-md-12">

					<table class="table table-responsive campaign-table">
					@if(!empty($campaigns))
						<tr>
							<th>Name</th>
							<th>Phone Number</th>
							<th>Inbox ID</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Duplicates</th>
							<th></th>
						</tr>
						@foreach($campaigns as $key => $campaign)
							<tr>
								<td>{{ $campaign["campaign_name"] }}</td>
								<td>{{ $campaign["campaign_phone_number"] }}</td>
								<td>{{ $campaign["campaign_inbox_id"] }}</td>
								<td>{{ $campaign["campaign_start_date"] }}</td>
								<td>{{ $campaign["campaign_end_date"] }}</td>
								<td>{{ $campaign["duplicate"] }}</td>
								<td><a href="{{ url() }}/view-campaign/{{ $campaign["id"] }}" class="btn btn-xs btn-primary">View</a></td>
							</tr>
						@endforeach
					@else
						<tr>
							<td>No campaigns added.</td>
						</tr>
					@endif


		</div>


            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


@stop