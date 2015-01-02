@extends('Layouts.layout')
@section('content')
<div class="homepage-cover page-cover entry-cover has-image home_banner_image">
   <div class="cover-wrapper container">
      <div class="listify_widget_search_listings">
         <hgroup class="home-widget-section-title">
            <h1 class="home-widget-title">{{$homeLang['home_title']}}</h1>
            <h2 class="home-widget-description">
               {{$homeLang['home_subtitle']}}
            </h2>
         </hgroup>
         <div class="job_listings" data-location="" data-keywords="" data-show_filters="true" data-show_pagination="false" data-per_page="500" data-orderby="featured" data-order="DESC" data-categories="">
            <a href="#" data-toggle=".job_filters" class="js-toggle-area-trigger">Toggle Filters</a>
            <form action="/keyword" class="job_search_form" method="post">
               <div class="search_jobs">
                  <div class="search_keywords">
                     <input name="search_keywords" id="search_keywords" placeholder="Keywords" value="" type="text">
                  </div>
                  <div>
                     <select name="search_categories" id="search_categories" class="postform">
                        @if(isset($all_categories))
                           @foreach($all_categories as $data)
                              <option value="{{$data->id}}">{{$data->category}}</option>
                           @endforeach
                        @endif
                     </select>
                  </div>
                  <div>
                     <select name="search_locations" id="search_locations" class="postform">
                        @if(isset($all_locations))
                           @foreach($all_locations as $data)
                              <option value="{{$data->id}}" >{{$data->location}}</option>
                           @endforeach
                        @endif
                     </select>
                  </div>
               </div>
               <button type="submit" name="update_results" class="update_results">{{$homeLang['home_search_button_text']}}</button>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="container homepage-hero-style-video">
   <aside id="listify_widget_taxonomy_image_grid-3" class="home-widget listify_widget_taxonomy_image_grid">
      <hgroup class="home-widget-section-title">
         <h2 class="home-widget-title">{{$homeLang['home_category_title']}}</h2>
         <h2 class="home-widget-description">{{$homeLang['home_category_subtitle']}}</h2>
      </hgroup>
      <div class="row">
         @if(isset($all_categories))
            @foreach($all_categories as $data)
               <section id="image-grid-term-new-york-city" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                  <div class="home_category_image col-xs-12 col-sm-6 col-md- image-grid-cover entry-cover has-image">
                     <a href="/keyword/{{$data->id}}" class="cover-wrapper">{{$data->category}}</a>
                  </div>
               </section>
            @endforeach
         @endif   
      </div>
   </aside>
   <aside id="listify_widget_recent_listings-3" class="home-widget listify_widget_recent_listings">
      <hgroup class="home-widget-section-title">
         <h2 class="home-widget-title">{{$homeLang['home_recent_title']}}</h2>
         <h2 class="home-widget-description">{{$homeLang['home_recent_subtitle']}}</h2>
      </hgroup>
      <ul class="job_listings">
         @if(isset($recentBatches))
            @foreach($recentBatches as $data)
               <li id="job_listing-685" class="post-685 job_listing type-job_listing status-publish has-post-thumbnail hentry col-xs-12 col-sm-6 col-md-4 style-grid" data-longitude="-79.4255347" data-latitude="43.6380835" data-color="#627e82" data-icon="ion-scissors" data-term="174" data-grid-columns="col-xs-12 col-sm-6 col-md-4">
                  <div class="content-box">
                     <a href="/batches/{{$data->id}}" class="job_listing-clickbox"></a>
                     <header class="job_listing-entry-header home_recent_image listing-cover has-image">
                        <div class="job_listing-entry-header-wrapper cover-wrapper">
                           <h1 itemprop="name" class="job_listing-title">
                              {{$data->batch}}
                           </h1>
                           <div>
                              <span class="glyphicon glyphicon-home"></span>
                              {{$data->locality}}, {{$data->location}}
                           </div>
                           <div>
                              <span class="glyphicon glyphicon-phone"><a href="tel:{{$data->venue_contact_no}}">{{$data->venue_contact_no}}</a></span>
                           </div>
                        </div>
                     </header>
                     <footer class="job_listing-entry-footer">
                        <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="job_listing-rating-wrapper" title="4 Reviews">
                           <span class="stars-rating">
                              @for($i=0;$i<$data->institute_rating;$i++)
                                 <span class="glyphicon glyphicon-star"></span>
                              @endfor
                           </span>
                           <span class="job_listing-rating-average">
                              <span itemprop="ratingValue">{{$data->institute_rating}}</span>
                           </span>
                        </div>
                     </footer>
                  </div>
               </li>
            @endforeach
         @endif 
      </ul>
   </aside>
</div>
<aside id="listify_widget_feature_callout-4" class="home-widget listify_widget_feature_callout">
   <div class="feature-callout text-left image-pull">
      <div class="container">
         <div class="col-xs-12 col-sm-6 ">
            <div class="callout-feature-content">
               <h2 class="callout-feature-title">{{$homeLang['home_user_title']}}</h2>
               <p>{{$homeLang['home_user_text']}}</p>
               <p><a href="#" class="button">{{$homeLang['home_button']}}</a></p>
            </div>
         </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-sm-offset-6 feature-callout-image-pull home_user_image" ></div>
   </div>
</aside>
<div class="container">
</div>
<aside id="listify_widget_feature_callout-3" class="home-widget listify_widget_feature_callout">
   <div class="feature-callout text-left image-cover">
      <div class="feature-callout-cover no-overlay home_institute_image">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-md-6 ">
                  <div class="callout-feature-content">
                     <h2 class="callout-feature-title">{{$homeLang['home_institute_title']}}</h2>
                     <p><a href="#" class="button">{{$homeLang['home_button']}}</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</aside>
<div class="container">
</div>
@stop