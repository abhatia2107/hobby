@extends("Layouts.layout")
@section("content")
<div class="home_vendor_page">
	<nav class="navbar navbar-inverse" id="vendorNavBar">
	    <div class="container-fluid">
		    <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#vendorNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                
			    </button>
		    </div>
		    <div class="collapse navbar-collapse" id="vendorNavbar">
				<ul class="nav navbar-nav">
					<li ><a href="/institutes/1">Institute Profile</a></li>
					<li ><a href="/batches">My Classes</a></li>
					<li class="active"><a href="#">My Venues</a></li>
				</ul>
		      	<ul class="nav navbar-nav navbar-right">
		        	<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		      	</ul>
		    </div>
		</div>
	</nav>
	<div class="container">
		<div class="vendor_institute_batches venues_list_container col-md-12 col-xs-12 col-sm-12">
			<div class="vendor_batches_title">
		   		<h1>My Venues</h1>
		   	</div><br><br>		   	
		   	@foreach($venues as $index => $data)
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="venues_list">
						<div class="venues_list_tittle">{{$data->venue}}</div>
						<br>
						<div class="venue_info"><span class='tag'>Address: </span>{{$data->venue_address}}, {{$data->locality}}, {{$data->location}}, {{$data->venue_pincode}}</div>
						<div class="venue_info"><span class='tag'>Contact No.: </span>{{$data->venue_contact_no}}</div>
						<div class="venue_info"><span class='tag'>E-Mail: </span>{{$data->venue_email}}</div>
						<div class="venue_info"><span class='tag'>Land Mark: </span>{{$data->venue_landmark}}</div>
					
						<br>
						<div class="venue">
							<center>
							<button type="submit" class="btn btn-primary">Edit</button>
							<button type="submit" class="btn btn-primary">Delete</button>
							</center>
						</div>
					</div>
				</div>  		
		   	@endforeach
		   		@foreach($venues as $index => $data)
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="venues_list">
						<div class="venues_list_tittle">{{$data->venue}}</div>
						<br>
						<div class="venue_info"><span class='tag'>Address: </span>{{$data->venue_address}}, {{$data->locality}}, {{$data->location}}, {{$data->venue_pincode}}</div>
						<div class="venue_info"><span class='tag'>Contact No.: </span>{{$data->venue_contact_no}}</div>
						<div class="venue_info"><span class='tag'>E-Mail: </span>{{$data->venue_email}}</div>
						<div class="venue_info"><span class='tag'>Land Mark: </span>{{$data->venue_landmark}}</div>
					
						<br>
						<div class="venue">
							<center>
							<button type="submit" class="btn btn-primary">Edit</button>
							<button type="submit" class="btn btn-primary">Delete</button>
							</center>
						</div>
					</div>
				</div>  		
		   	@endforeach
			@foreach($venues as $index => $data)
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="venues_list">
						<div class="venues_list_tittle">{{$data->venue}}</div>
						<br>
						<div class="venue_info"><span class='tag'>Address: </span>{{$data->venue_address}}, {{$data->locality}}, {{$data->location}}, {{$data->venue_pincode}}</div>
						<div class="venue_info"><span class='tag'>Contact No.: </span>{{$data->venue_contact_no}}</div>
						<div class="venue_info"><span class='tag'>E-Mail: </span>{{$data->venue_email}}</div>
						<div class="venue_info"><span class='tag'>Land Mark: </span>{{$data->venue_landmark}}</div>
					
						<br>
						<div class="venue">
							<center>
							<button type="submit" class="btn btn-primary">Edit</button>
							<button type="submit" class="btn btn-primary">Delete</button>
							</center>
						</div>
					</div>
				</div>  		
		   	@endforeach
		</div>
	</div>
</div>
@stop