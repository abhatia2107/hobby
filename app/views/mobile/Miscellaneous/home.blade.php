@extends('Layouts.layout')
@section('content')
<div class="overlay-slider">
<div class="homepage-cover">
   <div class="container" id="hompage-cover" style="margin:0;padding:0">
      <div class="hobby_search_listings" style="background-color: rgba(0, 0, 0, 0.5);padding:5px 0px 10px 0px;">
         <div>
            <h1>{{$homeLang['home_title']}}</h1>
            <h2>{{$homeLang['home_subtitle']}}</h2>
         </div>
         <div class="explore_button" style="padding-top:8px"><a href="/filter/categories/1/locations" class="btn btn-primary">Explore Now</a></div>  
      </div>
   </div>
</div>
</div>
<div class="container membership_message" style="background:#3396D1">
	<div class="alert">		
		<button type="button" onclick="hideMembershipMessage()" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		<h3><a href="/memberships"><u>{{$homeLang['home_membership_title']}}</u></a></h3>
		<strong>{{$homeLang['home_membership_tagline']}}</strong>
		<div style="color:white;">
			<a href="tel:+919100946081">Call: +91-9100 946 081</a>
		</div>
	</div>
</div>
<div class="container featured_listing_container">
	<div class="featured_listing_title">Fitness Studios</div>
	<?php
		$institutesLength = sizeof($institutes);
		$index = 0;
		$maxlength = 20;				
		if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }		
	?>	
	@for(;$index<$maxlength; $index++ )
		<div class="col-md-4 col-sm-4 col-xs-12 featured_listing_item">		
			<li title="{{$institutes[$index]->institute}} in {{$institutes[$index]->locality}} - Hyderabad">
				<a class="text_over_flow_hide" href="/filter/institute/{{$institutes[$index]->id}}">
					{{$institutes[$index]->institute}},{{$institutes[$index]->locality}}
				</a>
			</li>
		</div>	
	@endfor				
</div>
<div class="division_divider"></div>
<div class="container featured_listing_container">
	<div class="featured_listing_title">Fitness Activities</div>
	<?php
		$institutesLength = sizeof($subcategories);
		$index = 0;
		$maxlength = 20;			
		if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }		
	?>
	@for(; $index<$maxlength; $index++ )
		<div class="col-xs-6 featured_listing_item">		
			<li title="{{$subcategories[$index]->subcategory}} classes in Hyderabad">
				<a class="text_over_flow_hide" href="/filter/subcategory/{{$subcategories[$index]->id}}">
					{{$subcategories[$index]->subcategory}}
				</a>
			</li>
		</div>					
	@endfor
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
	@for(;$index<$maxlength; $index++ )
		<div class="col-xs-6 featured_listing_item">		
			<li title="Fitness Activities in {{$localities[$index]->locality}}">
				<a href="/filter/locality/{{$localities[$index]->id}}">
					{{$localities[$index]->locality}}
				</a>
			</li>
		</div>		
	@endfor
</div>
@stop
@section('pagejquery')
@stop