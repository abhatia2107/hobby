@extends('Layouts.layout')
@section('content')
<div class="container membership_message" style="position:absolute;">	
	<div class="alert">		
		<div style="color:white;position:absolute;right:40px;">
			<!-- <a href="tel:+919100946081"> -->Call: +91-9100 946 081<!-- </a> -->
		</div>
		<button onclick="hideMembershipMessage()" class="close" data-dismiss="alert" aria-hidden="true">x</button>		 
		<h3><a href="/memberships"><u>{{$homeLang['home_membership_title']}}</u></a></h3>
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
	         <span class="explore_button"><a href="/memberships" class="btn btn-primary" style="background:#e24648">Check out Membership</a></span>
	         <span class="explore_button" style="margin-left:5px;" ><a href="/filter/categories/Fitness/locations/Hyderabad" class="btn btn-primary">Check out Classes</a></span>
	      </div>
	   </div>
	</div>
</div>
<div class="container membership_offer_container">
	<div class="header">
		<a style="color:black;text-decoration:none" href="/memberships">Hobbyix Membership</a>
	</div>
	<script>
  (function() {
    var cx = '001868570926516956913:k1behnqa6xq';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    //s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
	<div class="col-md-12 col-sm-12 col-xs-12">	
		<div class="col-md-4 col-sm-4 col-xs-12 membership_offer_item">
			<div class="header"></div>
			<div class="details">
				<img alt="Fitness_AnyTime" title="Fitness_AnyTime" src="/assets/images/home/Fitness_AnyTime.PNG">				
			</div>
			<div class="footer">Have Fitness Classes Available 24X7, Choose What Suits Your Schedule</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12 membership_offer_item">
			<div class="header"></div>
			<div class="details">
				<img alt="Fitness_AnyWhere" title="Fitness_AnyWhere" src="/assets/images/home/Fitness_AnyWhere.PNG">				
			</div>		
			<div class="footer">Don't Settle For One Gym when you can go to any gym</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12 membership_offer_item">
			<div class="header"></div>
			<div class="details">
				<img alt="Fitness_AnyType" title="Fitness_AnyType" src="/assets/images/home/Fitness_AnyType.PNG">				
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
		$maxlength = 60;			
		if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }		
	?>
	@for(; $index<$maxlength; $index++ )
		<div class="col-md-3 col-sm-3 col-xs-6 featured_listing_item" itemscope itemtype="http://schema.org/SportsActivityLocation">		
			<li title="{{$subcategories[$index]->subcategory}} classes in Hyderabad">
				<a class="text_over_flow_hide" itemprop="url" href="/filter/subcategory/{{$subcategories[$index]->subcategory}}">
					<span itemprop="name">{{$subcategories[$index]->subcategory}}</span>
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
		$maxlength = 60;	
		if ($localitiesLength<$maxlength) { $maxlength = $localitiesLength; }		
	?>
	@for(;$index<$maxlength; $index++ )
		<div class="col-md-3 col-sm-3 col-xs-6 featured_listing_item" itemscope itemtype="http://schema.org/SportsActivityLocation" >		
			<li title="Fitness Activities in {{$localities[$index]->locality}}">
				<a itemprop="url" href="/filter/locality/{{$localities[$index]->locality_url}}">
					<span itemprop="name">{{$localities[$index]->locality}}</span>
				</a>
			</li>
		</div>		
	@endfor
</div>
<div class="division_divider"></div>
<div class="container featured_listing_container">
	<div class="featured_listing_title">Fitness Studios</div>
	<?php
		$institutesLength = sizeof($institutes);
		$index = 0;
		$maxlength = 60;				
		if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }		
	?>	
	@for(;$index<$maxlength; $index++ )
		<div class="col-md-4 col-sm-4 col-xs-12 featured_listing_item" itemscope itemtype="http://schema.org/SportsActivityLocation">		
			<li title="{{$institutes[$index]->institute}} in {{$institutes[$index]->locality}} - Hyderabad" >
				<a class="text_over_flow_hide" itemprop="url" href="/filter/institute/{{$institutes[$index]->institute_url}}">
					<span itemprop="name">{{$institutes[$index]->institute}}, {{$institutes[$index]->locality}}</span>
				</a>
			</li>
		</div>	
	@endfor				
</div>
@stop
@section('pagejquery')
<script type="application/ld+json">
{
   "@context": "http://schema.org",
   "@type": "WebSite",
   "url": "http://hobbyix.com",
   "potentialAction": {
     "@type": "SearchAction",
     "target": "http://hobbyix.com/filter/search?keyword={keyword}&category_id=0&location_id=0&chunk=0",
     "query-input": "required name=keyword"
   }
}
</script>
@stop