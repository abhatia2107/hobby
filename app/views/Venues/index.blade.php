@extends("Layouts.layout")
@section("content")
	<div class="home_vendor_page">
		@include('Templates.navbarVendor')
		<div class="container">
			<div class="vendor_institute_batches venues_list_container col-md-12 col-xs-12 col-sm-12">
				<div class="vendor_batches_title">
		   			<button class="btn btn-primary" data-toggle="modal" data-target="#venueCreate">Add Venue</button>
			   		<h1>My Venues</h1>
			   	</div><br/><br/>
			   	@foreach($venues as $data)
					<div class="col-md-4 col-xs-12 col-sm-4">
						<div class="venues_list">
							<div class="venues_list_tittle">{{$data->venue}}</div>
							<br/>
							<div class="venue_info"><span class='tag'>Address: </span>{{$data->venue_address}}, {{$data->locality}}, {{$data->location}}, {{$data->venue_pincode}}</div>
							<div class="venue_info"><span class='tag'>Contact No.: </span>{{$data->venue_contact_no}}</div>
							<div class="venue_info"><span class='tag'>E-Mail: </span>{{$data->venue_email}}</div>
							<div class="venue_info"><span class='tag'>Land Mark: </span>{{$data->venue_landmark}}</div>
							<br/>
							<div class="venue">
								<center>
									<a href="/venues/edit/{{$data->id}}"><button type="submit" class="btn btn-primary">Edit</button></a>
									<!-- </button> -->
									<a href="/venues/delete/{{$data->id}}"><button class="btn btn-primary">Delete</button></a>
								</center>
							</div>
						</div>
					</div>  		
			   	@endforeach
			</div>
		</div>
	</div>
    <div class="modal fade" id="venueCreate" ="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   @include('Modals.venue')
</div>
<script type="text/javascript">
	 navActive('navbar-vendor-venues');
</script>
@stop

