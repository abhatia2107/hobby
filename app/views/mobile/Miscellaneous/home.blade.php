@extends('Layouts.layout')
@section('content')
<div class="overlay-slider">
<div class="homepage-cover">
   <div class="container" id="hompage-cover">
      <div class="hobby_search_listings" style="background-color: rgba(0, 0, 0, 0.3);">
         <div>
            <h1>{{$homeLang['home_title']}}</h1>
            <h2>{{$homeLang['home_subtitle']}}</h2>
         </div>
         <div class="explore_button"><a href="/filter/categories/1/locations" class="btn btn-primary">Explore Now</a></div>  
      </div>
   </div>
</div>
</div>
<div class="container featured_listing_container">
	<div class="featured_listing_title">Fitness Studios</div>
	<?php
		$institutesLength = sizeof($institutes);
		$index = 0;
		$maxlength = 15;
		$colNum = 2;
		if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }
		$listLength = $maxlength / $colNum;
	?>
	@for($col = 0;$col<=$colNum;$col++ )
		<div class="col-xs-12 featured_listing_item">
		@for(; $index<$listLength && $index<$maxlength; $index++ )
			<li title="{{$institutes[$index]->institute}} in {{$institutes[$index]->locality}} - Hyderabad">
				<a href="/filter/institute/{{$institutes[$index]->id}}">
					{{$institutes[$index]->institute}},{{$institutes[$index]->locality}}
				</a>
			</li>
		@endfor
		<?php
			$listLength += $listLength;
		?>
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
		$colNum = 2;
		if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }
		$listLength = $maxlength / $colNum;
	?>
	@for($col = 0;$col<=$colNum;$col++ )
		<div class="col-xs-6 featured_listing_item">
		@for(; $index<$listLength && $index<$maxlength; $index++ )
			<li title="{{$subcategories[$index]->subcategory}} classes in Hyderabad">
				<a href="/filter/subcategory/{{$subcategories[$index]->id}}">
					{{$subcategories[$index]->subcategory}}
				</a>
			</li>
		@endfor
		<?php
			$listLength += $listLength;
		?>
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
		$colNum = 2;
		if ($localitiesLength<$maxlength) { $maxlength = $localitiesLength; }
		$listLength = $maxlength / $colNum;
	?>
	@for($col = 0;$col<=$colNum;$col++ )
		<div class=" col-xs-6 featured_listing_item">
		@for(; $index<$listLength && $index<$maxlength; $index++ )
			<li title="Fitness Activities in {{$localities[$index]->locality}}">
				<a href="/filter/locality/{{$localities[$index]->id}}">
					{{$localities[$index]->locality}}
				</a>
			</li>
		@endfor
		<?php
			$listLength += $listLength;
		?>
		</div>
	@endfor
</div>
@stop
@section('pagejquery')
@stop