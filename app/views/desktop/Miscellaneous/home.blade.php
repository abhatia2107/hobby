@extends('Layouts.layout')
@section('content')
@if(isset($booking_institute) && $booking_institute != null )
<div class="modal fade" id="reviewModal" role="dialog" data-backdrop="static">
	@include('Modals.review')
</div>
@endif
<div class="container membership_message">	
	<div class="alert">		
		<div class="contact">
			<!-- <a href="tel:+919100946081"> -->Call: <span itemprop="tel">+91-9100 946 081</span> <!-- </a> -->
		</div>
		<button onclick="hideMembershipMessage()" class="close" data-dismiss="alert" aria-hidden="true">x</button>		 
		<h3><a title="Hobbyix Membership" href="/memberships">{{$homeLang['home_membership_title']}}</a></h3>
		<strong>{{$homeLang['home_membership_tagline']}}</strong>		
	</div>
</div>
<div class="overlay-slider">
	<div class="homepage-cover">
	   <div class="container" id="hompage-cover">
	      <div class="hobby_search_listings">
	         <div>
	            <h1>{{$homeLang['home_title']}}</h1>
	            <h2>{{$homeLang['home_subtitle1']}}</h2>
	            <h2>{{$homeLang['home_subtitle2']}}</h2>	            
	         </div>  
	         <span class="explore_button">
	         	<a title="Hobbyix Membership" href="/memberships" class="btn btn-primary">Check out Membership</a>
	         </span>
	         <span class="checkoutButton" ><a title="Check out Classes" href="/filter/Fitness/Hyderabad" class="btn btn-primary">Check out Classes</a></span>
	      </div>
	   </div>
	</div>
</div>
<div class="container membership_offer_container">
	<div class="header">
		Hobbyix Membership
	</div>
	<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1">	
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 membership_offer_item">
			<div class="header"></div>
			<div class="details">
				<img alt="Fitness_AnyTime" title="Fitness_AnyTime" src="/assets/images/home/Fitness-AnyTime.PNG">				
			</div>
			<div class="footer">Have Fitness Classes Available 24X7, Choose What Suits Your Schedule</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 membership_offer_item ">
			<div class="header"></div>
			<div class="details">
				<img alt="Fitness_AnyWhere" title="Fitness_AnyWhere" src="/assets/images/home/Fitness-AnyWhere.PNG">				
			</div>		
			<div class="footer">Don't Settle For One Gym when you can go to any gym</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 membership_offer_item">
			<div class="header"></div>
			<div class="details">
				<img alt="Fitness_AnyType" title="Fitness_AnyType" src="/assets/images/home/Fitness-AnyType.PNG">				
			</div>		
			<div class="footer">Spice Up Your Fitness Schedule With A New Type Of Activity Everyday</div>
		</div>		
	</div>	
</div>
<div class="container featured_listing_container">
	<div class="featured_listing_title">Fitness Activities</div>
	<?php
		$institutesLength = sizeof($subcategories);
		$index = 0;
		$maxlength = 20;			
		if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }	
		$tomorrowDate = new DateTime('tomorrow');
		$tomorrowDate = $tomorrowDate->format('Y-m-d');	
	?>
	<ul class="maz_pad_z">		
	@for(; $index<$maxlength; $index++ )		
		<li class="col-md-3 col-sm-3 col-xs-6 featured_listing_item" itemscope itemtype="http://schema.org/SportsActivityLocation" title="{{$subcategories[$index]->subcategory}} classes in Hyderabad">
			<a class="text_over_flow_hide" itemprop="url" href="/filter/{{$subcategories[$index]->subcategory}}/Hyderabad">
				<span itemprop="name">{{$subcategories[$index]->subcategory}}</span>
			</a>
		</li>				
	@endfor
	</ul>		
</div>
<div class="division_divider"></div>
<div class="container featured_listing_container">
	<div class="featured_listing_title">Fitness Activities by Location</div>	
	<?php
		$localitiesLength = sizeof($localities);
		$index = 0;
		$maxlength = 20;	
		if ($localitiesLength<$maxlength) { $maxlength = $localitiesLength; }		
	?>
	<ul class="maz_pad_z">		
	@for(;$index<$maxlength; $index++ )		
		<li class="col-md-3 col-sm-3 col-xs-6 featured_listing_item" itemscope itemtype="http://schema.org/SportsActivityLocation"  title="Fitness Activities in {{$localities[$index]->locality}}">
			<a class="text_over_flow_hide" itemprop="url" href="/filter/Fitness/{{$localities[$index]->locality_url}}">
				<span itemprop="name">{{$localities[$index]->locality}}</span>
			</a>
		</li>		
	@endfor
	</ul>	
</div>
<div class="division_divider"></div>
<div class="container featured_listing_container">
	<div class="featured_listing_title">Fitness Studios</div>
	<?php
		$institutesLength = sizeof($institutes);
		$index = 0;
		$maxlength = 30;				
		if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }		
	?>
	<ul class="maz_pad_z">		
	@for(;$index<$maxlength; $index++ )	
		<li class="col-md-4 col-sm-4 col-xs-12 featured_listing_item" itemscope itemtype="http://schema.org/SportsActivityLocation" title="{{$institutes[$index]->institute}} in {{$institutes[$index]->locality}} - Hyderabad" >
			<a class="text_over_flow_hide" itemprop="url" href="/filter/{{$institutes[$index]->institute_url}}">
				<span itemprop="name">{{$institutes[$index]->institute}}, {{$institutes[$index]->locality}}</span>
			</a>
		</li>		
	@endfor
	</ul>
</div>
@stop
@section('pagejquery')
<script type="text/javascript">	
	var reviewModalStatus = false;
	if(!reviewModalStatus)
	{
		reviewModalStatus = true; 
		$('#reviewModal').modal('show');
		$('#reviewModal').modal({backdrop: 'static'});		
	}		
	$(document).ready(function () {		
		$("#bookFavClass").click(function (e) {
			e.preventDefault();
            e.stopPropagation();
			$("#bookFavClassButton").hide();
			$("#bookFavClassConfirm").fadeIn(500);			
		});
		$("#bookingDateChange").click(function (e) {
			e.preventDefault();
			$(".favButton").css('pointer-events','none');
        	$("#booking_date").val("{{$tomorrowDate}}");
        	if($("#booking_date").val() == "{{$tomorrowDate}}")
        		$("#bookFavClassForm").submit();
		});
	});
	$(document).ready(function() {      
	    $('.favButton').click(function() {
			$("#bookFavClassConfirm").hide();
	    })
	});
	function closeFavClassBook () {
		$("#bookFavClassConfirm").hide();
		$("#bookFavClassButton").fadeIn(500);	
	}
</script>
@stop