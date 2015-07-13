@extends('master')

@section('content')



        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                

		<div class="row">
			<div class="col-md-12">
					
					<!-- top bit -->

					<h2 class="pull-left">Campaign Title</h2>

					<div class="top-btn-container pull-right">
						<a class="btn btn-sm btn-primary" href="{{ url() }}/create"><i class="glyphicon glyphicon-plus"></i> Add Campaign</a>
						<a class="btn btn-sm btn-danger" href="{{ url() }}/logout"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
					</div>

			</div>
		</div>


		<div class="content-container">
		
			<div class="row col-md-8">
				<div class="campaign-info-container">
					<p><strong>SMS Number:</strong> 6676</p>
					<p><strong>Campaign Time From:</strong> 10:00 - 12:00 07/07/2015</p>
					<p><strong>Duplicates Accepted?:</strong> No</p>
				</div>
			</div>

			<div class="col-md-4 search-filter-container">
				<form class="pull-right">

				  <div class="form-group">
				    <div class="input-group">
				      <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
				      <input type="text" class="form-control search-field" name="search_filter" id="search_filter" placeholder="Search...">
				    </div>
				  </div>

				</form>
			</div>


			<!-- main table goes here 	 -->

			<div class="row">
				<div class="col-md-12">

					<table class="table table-responsive campaign-table">
					<tr>
						<th>Entry Time</th>
						<th>Entry Date</th>
						<th>Phone Number</th>
						<th>Key Word</th>
						<th>Email Address</th>
						<th>Number of Runs</th>
					</tr>
					<tr>
						<td>content</td>
						<td>content</td>
						<td>content</td>
						<td>content</td>
						<td>content</td>
						<td>content</td>
					</tr>
					</table>

					<p class="pull-right"><a href="{{ url() }}/export-csv" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-export"></i> Export to .csv</a></p>


				</div>
			</div>

			<!-- 			//			 -->
		</div>s


            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


@stop