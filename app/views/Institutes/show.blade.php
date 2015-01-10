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
					<li class="active" ><a href="" >Institute Profile</a></li>
					<li><a href="/batches">My Classes</a></li>
					<li><a href="/venues">My Venues</a></li>
				</ul>
		      	<ul class="nav navbar-nav navbar-right">
		        	<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		      	</ul>
		    </div>
		</div>
	</nav>
	<div class="container vendor_institute_details">
		<div class="col-md-12 col-xs-12 col-sm-12 column" id="institute_header">
			<div class="col-md-11 col-xs-12 col-sm-8 column">
				<h1>{{" ".$instituteDetails->institute}}</h1>
			</div>
			<div class="col-md-1 col-xs-12 col-sm-4 column">
				<div class="inscore"><span id="rating-value">{{$instituteDetails->institute_rating}}</span></div><br>
				<span style="clear:both;position:relative"class="stars">{{$instituteDetails->institute_rating}}</span>
			</div>

		</div>
		<div class="col-md-12 col-xs-12 col-sm-12 column" id="institute_details_box">
			<div class="col-md-6 col-xs-12 col-sm-6 column">
				<li><span class="glyphicon glyphicon-map-marker"></span>{{$instituteDetails->institute}}</li>
				<li><span class="glyphicon glyphicon-phone"></span></li>
				<li><span class="glyphicon glyphicon-hand-right"></span></li>
				<li><span class="glyphicon glyphicon-hand-right"></span></li>
				
			</div>
			<div class="col-md-6 col-xs-12 col-sm-6 column">
				<li><span class="glyphicon glyphicon-globe"></span><a href="{{$instituteDetails->institute_website}}">{{$instituteDetails->institute_website}}</a></li>
				<li><span class="glyphicon glyphicon-link"></span><a href="{{$instituteDetails->institute_website}}">{{$instituteDetails->institute}}</a></li>
				<li><span class="glyphicon fa fa-fw fa-twitter"></span><a href="{{$instituteDetails->institute_twitter}}">{{$instituteDetails->institute_twitter}}</a></li>
				<li><span class="glyphicon fa fa-w fa-facebook"></span><a href="{{$instituteDetails->institute_fblink}}">{{$instituteDetails->institute_fblink}}</a></li>
			</div>
		</div>
	</div>
</div>
@stop