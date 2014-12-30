<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
    #batch
    {
      background: white;border:0.5px solid;padding:10px 10px;margin-bottom: 15px;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.5);-moz-box-shadow: 0px 0px 10px rgba(0,0,0,0.5);-webkit-box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
    }
  </style>
</head>
<body>


@extends('Layouts.layout')
@section('content')
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 col-xs-12 col-sm-12 column">
			<div class="row clearfix">
				<div class="col-md-3 col-xs-12 col-sm-3 column" >
						<center><h4>Filter Results</h4></center>
				</div>
				<div class="col-md-8 col-xs-12 col-sm-9 column">
					<center><h4>Results</h4></center>
					<?php 
					for($i=0;$i<10;$i++)
					{ ?>
						<div class="row clearfix" id="batch">
							<div class="col-md-12 col-xs-12 col-sm-12 column" >
									<div class="row clearfix">
										<div class="col-md-12 col-xs-12 col-sm-12 column">
											<div class="row clearfix">
												<div class="col-md-4 col-xs-12 col-sm-4 column">
													Institute Name<br>
													Tagline<br>
													Address<br>
													Locality,Location<br><br>
													Subcategory
												</div>
												<div class="col-md-4 col-xs-12 col-sm-4 column">
													Batch Name<br><br>
													Class Schedule<br>
													Gender<br><br>
													Open Class
												</div>
												<div class="col-md-4 col-xs-12 col-sm-4 column">
													Rating<br><br>
													Contact Now<br>
													Fee Structure<br><br>
													View Details
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
</body>
</html>
@stop