@extends('Layouts.layout')
@section('content')
<div class="overlay-slider">
<div class="homepage-cover">
   <div class="container" id="hompage-cover">
      <div class="hobby_search_listings" style="background-color: rgba(0, 0, 0, 0.2);">
         <div>
            <h1>{{$homeLang['home_title']}}</h1>
            <h2>{{$homeLang['home_subtitle']}}</h2>
         </div> 
         <div class="explore_button"><a href="/filter/categories/5/locations" class="btn btn-primary">Explore Now</a></div>  
      </div>
   </div>
</div>
</div>
<div class="division_divider_"></div>
<div class="container featured_listing_container">
<div class="featured_listing_title">Fitness Studios</div>
<div class="col-md-4 col-xs-12 featured_listing_item">
@for($index = 0;$index<=19;$index++ )
{{$institutes[$index]->institute."<br>"}}
@endfor
</div>
<div class="col-md-4 col-xs-12 featured_listing_item">
@for($index = 30;$index<=49;$index++)
{{$institutes[$index]->institute."<br>"}}
@endfor
</div>
<div class="col-md-4 col-xs-12 featured_listing_item">
@for($index = 60;$index<=79;$index++ )
{{$institutes[$index]->institute."<br>"}}
@endfor
</div>
</div>
@stop
@section('pagejquery')
@stop