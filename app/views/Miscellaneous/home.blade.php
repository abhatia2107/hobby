@extends('Layouts.layout')
@section('content')
<div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/10/main-bg-top_mini-1.jpg);" class="homepage-cover page-cover entry-cover has-image">
               <div class="cover-wrapper container">
                  <div class="listify_widget_search_listings">
                     <hgroup class="home-widget-section-title">
                        <h1 class="home-widget-title">Search Your City</h1>
                        <h2 class="home-widget-description">
                           Listify helps you find out whats happening in your city, Let's explore.
                        </h2>
                     </hgroup>
                     <div class="job_listings" data-location="" data-keywords="" data-show_filters="true" data-show_pagination="false" data-per_page="500" data-orderby="featured" data-order="DESC" data-categories="">
                        <a href="#" data-toggle=".job_filters" class="js-toggle-area-trigger">Toggle Filters</a>
                        <form action="https://demo.astoundify.com/listify/listings/" class="job_search_form">
                           <div class="search_jobs">
                              <div class="search_keywords">
                                 <label for="search_keywords">Keywords</label>
                                 <input name="search_keywords" id="search_keywords" placeholder="Keywords" value="" type="text">
                              </div>
                              <div class="search_categories">
                                 <label for="search_categories">Category</label>
                                 <select name="search_categories" id="search_categories" class="postform">
                                    <option value="0">Any category</option>
                                    @if(isset($all_locations))
                                       @foreach($all_categories as $data)
                                          <option value="{{$data->id}}">{{$data->category}}</option>
                                       @endforeach
                                    @endif
                                 </select>
                              </div>
                              <div style="display: none;" class="search-radius-wrapper">
                                 <div class="search-radius-label">
                                    <label for="use_search_radius">
                                    <input name="use_search_radius" id="use_search_radius" type="checkbox">
                                    Radius: <span class="radi">50</span> mi	</label>
                                 </div>
                                 <div class="search-radius-slider">
                                    <div class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="search-radius"><span style="left: 50%;" class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span></div>
                                 </div>
                                 <input id="search_radius" name="search_radius" value="50" type="hidden">
                              </div>
                              <input id="search_lat" name="search_lat" value="0" type="hidden">
                              <input id="search_lng" name="search_lng" value="0" type="hidden">
                              <div style="" class="filter_wide filter_by_tag too-tall"><span class="filter-label">Filter by tag: </span> <a href="#" class="tag-link-30" title="35 jobs" style="font-size: 2em;">Accepts Credit Cards</a>
                                 <a href="#" class="tag-link-36" title="20 jobs" style="font-size: 1.6065573770492em;">Parking</a>
                                 <a href="#" class="tag-link-31" title="15 jobs" style="font-size: 1.4098360655738em;">Takes Reservations</a>
                                 <a href="#" class="tag-link-54" title="13 jobs" style="font-size: 1.327868852459em;">Outdoor Seating</a>
                                 <a href="#" class="tag-link-51" title="13 jobs" style="font-size: 1.327868852459em;">Delivery</a>
                                 <a href="#" class="tag-link-32" title="12 jobs" style="font-size: 1.2622950819672em;">Take-out</a>
                                 <a href="#" class="tag-link-52" title="12 jobs" style="font-size: 1.2622950819672em;">Wheelchair Accessible</a>
                                 <a href="#" class="tag-link-35" title="11 jobs" style="font-size: 1.2131147540984em;">WiFi</a>
                                 <a href="#" class="tag-link-56" title="11 jobs" style="font-size: 1.2131147540984em;">Waiter Service</a>
                                 <a href="#" class="tag-link-34" title="10 jobs" style="font-size: 1.1475409836066em;">Good for Groups</a>
                                 <a href="#" class="tag-link-53" title="9 jobs" style="font-size: 1.0819672131148em;">Alcohol</a>
                                 <a href="#" class="tag-link-33" title="9 jobs" style="font-size: 1.0819672131148em;">Good for Kids</a>
                                 <a href="#" class="tag-link-57" title="8 jobs" style="font-size: 1em;">Caters</a>
                                 <a href="#" class="tag-link-55" title="8 jobs" style="font-size: 1em;">Has TV</a>
                              </div>
                              <input name="search_region" class="search_region" value="" type="hidden">	
                           </div>
                           <p class="filter-by-type-label">Filter by Listing Type:</p>
                           <input id="search_context" name="search_context" value="6" type="hidden">	
                           <ul style="" class="job_types">
                           </ul>
                           <button type="submit" name="update_results" class="update_results">Search Listings</button>
                           <div class="showing_jobs"></div>
                        </form>
                        <div class="archive-job_listing-filter-title">
                           <div class="archive-job_listing-layout-wrapper">
                              <a href="#" data-style="grid" class="archive-job_listing-layout button"><span class="ion-grid"></span></a>
                              <a href="#" data-style="list" class="archive-job_listing-layout button active"><span class="ion-navicon-round"></span></a>
                           </div>
                           <h3 class="archive-job_listing-found">
                              <span class="results-found">1</span> Results Found	
                           </h3>
                        </div>
                        <noscript>Your browser does not support JavaScript, or it is disabled. JavaScript must be enabled in order to view listings.</noscript>
                        <ul class="job_listings"></ul>
                        <a class="load_more_jobs" href="#" style="display:none;"><strong>Load more listings</strong></a>
                     </div>
                  </div>
               </div>
               <p>Listify helps you find out whats happening in your city, Let�s explore.</p>
            </div>
            <div class="container homepage-hero-style-video">
               <aside id="listify_widget_taxonomy_image_grid-3" class="home-widget listify_widget_taxonomy_image_grid">
                  <hgroup class="home-widget-section-title">
                     <h2 class="home-widget-title">Explore Your Community</h2>
                     <h2 class="home-widget-description">See whats happening in your community, or find new citys to explore.</h2>
                  </hgroup>
                  <div class="row">
                     <section id="image-grid-term-new-york-city" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/nyc-photo-1024x682.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/new-york-city/" class="cover-wrapper">Art &amp; Craft</a>
                        </div>
                     </section>
                     <section id="image-grid-term-new-york-city" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/nyc-photo-1024x682.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/new-york-city/" class="cover-wrapper">Cooking</a>
                        </div>
                     </section>
                     <section id="image-grid-term-ohio" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/IMG_5773-1024x682.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/ohio/" class="cover-wrapper">Creativity</a>
                        </div>
                     </section>
                     <section id="image-grid-term-new-york-city" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/nyc-photo-1024x682.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/new-york-city/" class="cover-wrapper">Dance</a>
                        </div>
                     </section>
                     <section id="image-grid-term-california" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/6323131287_d342bd98d2_b.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/california/" class="cover-wrapper">Education</a>
                        </div>
                     </section>
                     <section id="image-grid-term-florida" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/EOZpjI3oSqKPNnF2S4Tp_Untitled-1024x682.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/florida/" class="cover-wrapper">Fitness</a>
                        </div>
                     </section>
                     <section id="image-grid-term-florida" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/EOZpjI3oSqKPNnF2S4Tp_Untitled-1024x682.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/florida/" class="cover-wrapper">Media</a>
                        </div>
                     </section>
                     <section id="image-grid-term-florida" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/EOZpjI3oSqKPNnF2S4Tp_Untitled-1024x682.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/florida/" class="cover-wrapper">Music</a>
                        </div>
                     </section>
                     <section id="image-grid-term-florida" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/EOZpjI3oSqKPNnF2S4Tp_Untitled-1024x682.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/florida/" class="cover-wrapper">Professional</a>
                        </div>
                     </section>
                     <section id="image-grid-term-ohio" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/IMG_5773-1024x682.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/ohio/" class="cover-wrapper">Reading</a>
                        </div>
                     </section>
                     <section id="image-grid-term-florida" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/EOZpjI3oSqKPNnF2S4Tp_Untitled-1024x682.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/florida/" class="cover-wrapper">Sports</a>
                        </div>
                     </section>
                     <section id="image-grid-term-florida" class="col-xs-12 col-sm-6 col-md-4 image-grid-item">
                        <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/EOZpjI3oSqKPNnF2S4Tp_Untitled-1024x682.jpg);" class="col-xs-12 col-sm-6 col-md- image-grid-cover
                           entry-cover has-image">
                           <a href="https://demo.astoundify.com/listify/listing-region/florida/" class="cover-wrapper">Technology</a>
                        </div>
                     </section>
                  </div>
               </aside>
               <aside id="listify_widget_recent_listings-3" class="home-widget listify_widget_recent_listings">
                  <hgroup class="home-widget-section-title">
                     <h2 class="home-widget-title">Recent Listings</h2>
                     <h2 class="home-widget-description">Discover some of our best listings</h2>
                  </hgroup>
                  <ul class="job_listings">
                     <li id="job_listing-685" class="post-685 job_listing type-job_listing status-publish has-post-thumbnail hentry col-xs-12 col-sm-6 col-md-4 style-grid" data-longitude="-79.4255347" data-latitude="43.6380835" data-color="#627e82" data-icon="ion-scissors" data-term="174" data-grid-columns="col-xs-12 col-sm-6 col-md-4">
                        <div class="content-box">
                           <a href="https://demo.astoundify.com/listify/listing/555-liberty-village-toronto-ontario-canada-astoundify-barbershop/" class="job_listing-clickbox"></a>
                           <header style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/Stocksy_txp782c31421CE000_Medium_85879-1024x682.jpg);" class="job_listing-entry-header listing-cover has-image">
                              <div class="job_listing-entry-header-wrapper cover-wrapper">
                                 <div class="job_listing-entry-thumbnail">
                                    <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/Stocksy_txp782c31421CE000_Medium_85879-1024x682.jpg);" class="list-cover has-image"></div>
                                 </div>
                                 <div class="job_listing-entry-meta">
                                    <h1 itemprop="name" class="job_listing-title">
                                       Astoundify Barbershop	
                                    </h1>
                                    <div class="job_listing-location">
                                       <a class="google_map_link" href="http://maps.google.com/maps?q=555+Liberty+Village%2C+Toronto%2C+Ontario%2C+Canada&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank">555 Liberty Village, Toronto, Ontario, Canada</a>	
                                    </div>
                                    <div class="job_listing-phone">
                                       <span itemprop="telephone"><a href="tel:9055555555">(905) 555-5555</a></span>
                                    </div>
                                    <div class="job_listing-location-formatted" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><a class="google_map_link" href="http://maps.google.com/maps?q=555+Liberty+Village%2C+Toronto%2C+Ontario%2C+Canada&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank"><span class="location-street" itemprop="streetAddress">67 Mowat Avenue</span><br><span class="location-locality" itemprop="addressLocality">Toronto</span>, <span class="location-region" itemprop="addressRegion">Ontario</span></a></div>
                                 </div>
                              </div>
                           </header>
                           <footer class="job_listing-entry-footer">
                              <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="job_listing-rating-wrapper" title="4 Reviews">
                                 <span class="job_listing-rating-stars">
                                 <span class="stars-rating">
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 </span>
                                 </span>
                                 <span class="job_listing-rating-average">
                                 <span itemprop="ratingValue">4.8</span>
                                 </span>
                                 <span class="job_listing-rating-count">
                                 <span itemprop="reviewCount">4</span> Reviews	</span>
                              </div>
                              <div class="job-manager-form wp-job-manager-bookmarks-form">
                                 <div><a class="bookmark-notice" href="https://demo.astoundify.com/listify/dashboard/">Login to bookmark this Listing</a></div>
                              </div>
                           </footer>
                        </div>
                     </li>
                     <li id="job_listing-270" class="post-270 job_listing type-job_listing status-publish has-post-thumbnail hentry col-xs-12 col-sm-6 col-md-4 style-grid" data-longitude="-111.842532" data-latitude="33.303233" data-color="#eb974e" data-icon="ion-beer" data-term="50" data-grid-columns="col-xs-12 col-sm-6 col-md-4">
                        <div class="content-box">
                           <a href="https://demo.astoundify.com/listify/listing/8-s-san-marcos-pl-chandler-az-85225-united-states-santan-brewing-company/" class="job_listing-clickbox"></a>
                           <header style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/Stocksy_txpf3080aa3KME000_Medium_434948-1024x683.jpg);" class="job_listing-entry-header listing-cover has-image">
                              <div class="job_listing-entry-header-wrapper cover-wrapper">
                                 <div class="job_listing-entry-thumbnail">
                                    <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/Stocksy_txpf3080aa3KME000_Medium_434948-1024x683.jpg);" class="list-cover has-image"></div>
                                 </div>
                                 <div class="job_listing-entry-meta">
                                    <h1 itemprop="name" class="job_listing-title">
                                       SanTan Brewing Company	
                                    </h1>
                                    <div class="job_listing-location">
                                       <a class="google_map_link" href="http://maps.google.com/maps?q=8+S+San+Marcos+Pl+Chandler%2C+AZ+85225+United+States&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank">8 S San Marcos Pl Chandler, AZ 85225 United States</a>	
                                    </div>
                                    <div class="job_listing-phone">
                                       <span itemprop="telephone"><a href="tel:4809178700">(480) 917-8700</a></span>
                                    </div>
                                    <div class="job_listing-location-formatted" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><a class="google_map_link" href="http://maps.google.com/maps?q=8+S+San+Marcos+Pl+Chandler%2C+AZ+85225+United+States&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank"><span class="location-street" itemprop="streetAddress">8 South San Marcos Place</span><br><span class="location-locality" itemprop="addressLocality">Chandler</span>, <span class="location-region" itemprop="addressRegion">Arizona</span></a></div>
                                 </div>
                              </div>
                           </header>
                           <footer class="job_listing-entry-footer">
                              <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="job_listing-rating-wrapper" title="4 Reviews">
                                 <span class="job_listing-rating-stars">
                                 <span class="stars-rating">
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 </span>
                                 </span>
                                 <span class="job_listing-rating-average">
                                 <span itemprop="ratingValue">4.3</span>
                                 </span>
                                 <span class="job_listing-rating-count">
                                 <span itemprop="reviewCount">4</span> Reviews	</span>
                              </div>
                              <div class="job-manager-form wp-job-manager-bookmarks-form">
                                 <div><a class="bookmark-notice" href="https://demo.astoundify.com/listify/dashboard/">Login to bookmark this Listing</a></div>
                              </div>
                           </footer>
                        </div>
                     </li>
                     <li id="job_listing-264" class="post-264 job_listing type-job_listing status-publish has-post-thumbnail hentry col-xs-12 col-sm-6 col-md-4 style-grid" data-longitude="-79.6871404" data-latitude="43.4617715" data-color="#95cb70" data-icon="ion-pizza" data-term="28" data-grid-columns="col-xs-12 col-sm-6 col-md-4">
                        <div class="content-box">
                           <a href="https://demo.astoundify.com/listify/listing/240-leighland-avenue-oakville-on-canada-oliver-bonacini-cafe-grill/" class="job_listing-clickbox"></a>
                           <header style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/5912197101_9299fc4b3b_b.jpg);" class="job_listing-entry-header listing-cover has-image">
                              <div class="job_listing-entry-header-wrapper cover-wrapper">
                                 <div class="job_listing-entry-thumbnail">
                                    <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/5912197101_9299fc4b3b_b.jpg);" class="list-cover has-image"></div>
                                 </div>
                                 <div class="job_listing-entry-meta">
                                    <h1 itemprop="name" class="job_listing-title">
                                       Oliver &amp; Bonacini Caf� Grill	
                                    </h1>
                                    <div class="job_listing-location">
                                       <a class="google_map_link" href="http://maps.google.com/maps?q=240+Leighland+Avenue+Oakville%2C+ON%2C+Canada&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank">240 Leighland Avenue Oakville, ON, Canada</a>	
                                    </div>
                                    <div class="job_listing-phone">
                                       <span itemprop="telephone"><a href="tel:2892910265">(289) 291-0265</a></span>
                                    </div>
                                    <div class="job_listing-location-formatted" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><a class="google_map_link" href="http://maps.google.com/maps?q=240+Leighland+Avenue+Oakville%2C+ON%2C+Canada&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank"><span class="location-street" itemprop="streetAddress">240 Leighland Avenue</span><br><span class="location-locality" itemprop="addressLocality">Oakville</span>, <span class="location-region" itemprop="addressRegion">Ontario</span></a></div>
                                 </div>
                              </div>
                           </header>
                           <footer class="job_listing-entry-footer">
                              <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="job_listing-rating-wrapper" title="5 Reviews">
                                 <span class="job_listing-rating-stars">
                                 <span class="stars-rating">
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 </span>
                                 </span>
                                 <span class="job_listing-rating-average">
                                 <span itemprop="ratingValue">4.6</span>
                                 </span>
                                 <span class="job_listing-rating-count">
                                 <span itemprop="reviewCount">5</span> Reviews	</span>
                              </div>
                              <div class="job-manager-form wp-job-manager-bookmarks-form">
                                 <div><a class="bookmark-notice" href="https://demo.astoundify.com/listify/dashboard/">Login to bookmark this Listing</a></div>
                              </div>
                           </footer>
                        </div>
                     </li>
                     <li id="job_listing-452" class="post-452 job_listing type-job_listing status-publish has-post-thumbnail hentry col-xs-12 col-sm-6 col-md-4 style-grid" data-longitude="-81.6913909" data-latitude="41.4993921" data-color="#95cb70" data-icon="ion-pizza" data-term="28" data-grid-columns="col-xs-12 col-sm-6 col-md-4">
                        <div class="content-box">
                           <a href="https://demo.astoundify.com/listify/listing/234-euclid-ave-euclid-ave-cleveland-oh-44114-united-states-noodlecat/" class="job_listing-clickbox"></a>
                           <header style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/6108942040_831d9b466f_b.jpg);" class="job_listing-entry-header listing-cover has-image">
                              <div class="job_listing-entry-header-wrapper cover-wrapper">
                                 <div class="job_listing-entry-thumbnail">
                                    <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/6108942040_831d9b466f_b.jpg);" class="list-cover has-image"></div>
                                 </div>
                                 <div class="job_listing-entry-meta">
                                    <h1 itemprop="name" class="job_listing-title">
                                       Noodlecat	
                                    </h1>
                                    <div class="job_listing-location">
                                       <a class="google_map_link" href="http://maps.google.com/maps?q=234+Euclid+Ave%2C+Cleveland%2C+OH+44114%2C+United+States&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank">234 Euclid Ave, Cleveland, OH 44114, United States</a>	
                                    </div>
                                    <div class="job_listing-phone">
                                       <span itemprop="telephone"><a href="tel:2165890007">(216) 589-0007</a></span>
                                    </div>
                                    <div class="job_listing-location-formatted" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><a class="google_map_link" href="http://maps.google.com/maps?q=234+Euclid+Ave%2C+Cleveland%2C+OH+44114%2C+United+States&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank"><span class="location-street" itemprop="streetAddress">234 Euclid Avenue</span><br><span class="location-locality" itemprop="addressLocality">Cleveland</span>, <span class="location-region" itemprop="addressRegion">Ohio</span></a></div>
                                 </div>
                              </div>
                           </header>
                           <footer class="job_listing-entry-footer">
                              <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="job_listing-rating-wrapper" title="2 Reviews">
                                 <span class="job_listing-rating-stars">
                                 <span class="stars-rating">
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 </span>
                                 </span>
                                 <span class="job_listing-rating-average">
                                 <span itemprop="ratingValue">5.0</span>
                                 </span>
                                 <span class="job_listing-rating-count">
                                 <span itemprop="reviewCount">2</span> Reviews	</span>
                              </div>
                              <div class="job-manager-form wp-job-manager-bookmarks-form">
                                 <div><a class="bookmark-notice" href="https://demo.astoundify.com/listify/dashboard/">Login to bookmark this Listing</a></div>
                              </div>
                           </footer>
                        </div>
                     </li>
                     <li id="job_listing-660" class="post-660 job_listing type-job_listing status-publish has-post-thumbnail hentry col-xs-12 col-sm-6 col-md-4 style-grid" data-longitude="-122.122918" data-latitude="47.674509" data-color="#eb974e" data-icon="ion-beer" data-term="50" data-grid-columns="col-xs-12 col-sm-6 col-md-4">
                        <div class="content-box">
                           <a href="https://demo.astoundify.com/listify/listing/redmonds-bar-and-grill/" class="job_listing-clickbox"></a>
                           <header style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/EOZpjI3oSqKPNnF2S4Tp_Untitled-1024x682.jpg);" class="job_listing-entry-header listing-cover has-image">
                              <div class="job_listing-entry-header-wrapper cover-wrapper">
                                 <div class="job_listing-entry-thumbnail">
                                    <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/EOZpjI3oSqKPNnF2S4Tp_Untitled-1024x682.jpg);" class="list-cover has-image"></div>
                                 </div>
                                 <div class="job_listing-entry-meta">
                                    <h1 itemprop="name" class="job_listing-title">
                                       Redmond�s Bar and Grill	
                                    </h1>
                                    <div class="job_listing-location">
                                       <a class="google_map_link" href="http://maps.google.com/maps?q=7979+Leary+Way+NE+Redmond%2C+WA+98052+United+States&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank">7979 Leary Way NE Redmond, WA 98052 United States</a>	
                                    </div>
                                    <div class="job_listing-phone">
                                       <span itemprop="telephone"><a href="tel:4255589800">(425) 558-9800</a></span>
                                    </div>
                                    <div class="job_listing-location-formatted" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><a class="google_map_link" href="http://maps.google.com/maps?q=7979+Leary+Way+NE+Redmond%2C+WA+98052+United+States&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank"><span class="location-street" itemprop="streetAddress">7979 Leary Way Northeast</span><br><span class="location-locality" itemprop="addressLocality">Redmond</span>, <span class="location-region" itemprop="addressRegion">Washington</span></a></div>
                                 </div>
                              </div>
                           </header>
                           <footer class="job_listing-entry-footer">
                              <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="job_listing-rating-wrapper" title="4 Reviews">
                                 <span class="job_listing-rating-stars">
                                 <span class="stars-rating">
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 </span>
                                 </span>
                                 <span class="job_listing-rating-average">
                                 <span itemprop="ratingValue">4.5</span>
                                 </span>
                                 <span class="job_listing-rating-count">
                                 <span itemprop="reviewCount">4</span> Reviews	</span>
                              </div>
                              <div class="job-manager-form wp-job-manager-bookmarks-form">
                                 <div><a class="bookmark-notice" href="https://demo.astoundify.com/listify/dashboard/">Login to bookmark this Listing</a></div>
                              </div>
                           </footer>
                        </div>
                     </li>
                     <li id="job_listing-233" class="post-233 job_listing type-job_listing status-publish has-post-thumbnail hentry job_position_featured col-xs-12 col-sm-6 col-md-4 style-grid" data-longitude="-79.4415219" data-latitude="43.6397507" data-color="#6bd4e0" data-icon="ion-fork" data-term="72" data-grid-columns="col-xs-12 col-sm-6 col-md-4">
                        <div class="content-box">
                           <a href="https://demo.astoundify.com/listify/listing/1596-queen-street-w-toronto-on-m6r-glory-hole-doughnuts/" class="job_listing-clickbox"></a>
                           <header style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/8684005585_ee87d84a32_k-1024x682.jpg);" class="job_listing-entry-header listing-cover has-image">
                              <div class="job_listing-entry-header-wrapper cover-wrapper">
                                 <div class="job_listing-entry-thumbnail">
                                    <div style="background-image: url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/job_listings/2014/11/8684005585_ee87d84a32_k-1024x682.jpg);" class="list-cover has-image"></div>
                                 </div>
                                 <div class="job_listing-entry-meta">
                                    <h1 itemprop="name" class="job_listing-title">
                                       Glory Hole Doughnuts	
                                    </h1>
                                    <div class="job_listing-location">
                                       <a class="google_map_link" href="http://maps.google.com/maps?q=1596+Queen+Street+W+Toronto%2C+ON+M6R&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank">1596 Queen Street W Toronto, ON M6R</a>	
                                    </div>
                                    <div class="job_listing-phone">
                                       <span itemprop="telephone"><a href="tel:6473524848">(647) 352-4848</a></span>
                                    </div>
                                    <div class="job_listing-location-formatted" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><a class="google_map_link" href="http://maps.google.com/maps?q=1596+Queen+Street+W+Toronto%2C+ON+M6R&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank"><span class="location-street" itemprop="streetAddress">1596 Queen Street West</span><br><span class="location-locality" itemprop="addressLocality">Toronto</span>, <span class="location-region" itemprop="addressRegion">Ontario</span></a></div>
                                 </div>
                              </div>
                           </header>
                           <footer class="job_listing-entry-footer">
                              <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="job_listing-rating-wrapper" title="5 Reviews">
                                 <span class="job_listing-rating-stars">
                                 <span class="stars-rating">
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 <span class="dashicons dashicons-star-filled"></span>
                                 </span>
                                 </span>
                                 <span class="job_listing-rating-average">
                                 <span itemprop="ratingValue">4.6</span>
                                 </span>
                                 <span class="job_listing-rating-count">
                                 <span itemprop="reviewCount">5</span> Reviews	</span>
                              </div>
                              <div class="job-manager-form wp-job-manager-bookmarks-form">
                                 <div><a class="bookmark-notice" href="https://demo.astoundify.com/listify/dashboard/">Login to bookmark this Listing</a></div>
                              </div>
                           </footer>
                        </div>
                     </li>
                  </ul>
               </aside>
            </div>
            <aside id="listify_widget_feature_callout-4" class="home-widget listify_widget_feature_callout">
               <div class="feature-callout text-left image-pull" style="background-color: #ffffff;">
                  <div class="container">
                     <div class="col-xs-12 col-sm-6 ">
                        <div class="callout-feature-content" style="color:#717a8f">
                           <h2 class="callout-feature-title" style="color:#717a8f">Get The Exposure You Deserve (For users)</h2>
                           <p>Your business deserves efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.</p>
                           <p><a href="https://demo.astoundify.com/listify/how-it-works/" class="button">How It Works</a></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-sm-offset-6 feature-callout-image-pull" style="background-image:url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/get-exposure-for-your-biz.jpg); ?>; background-position: center top"></div>
               </div>
            </aside>
            <div class="container">
            </div>
            <aside id="listify_widget_feature_callout-3" class="home-widget listify_widget_feature_callout">
               <div class="feature-callout text-left image-cover" style="background-color: #ffffff;">
                  <div class="feature-callout-cover no-overlay" style="background-image:url(https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/10/iphone-home-page.jpg); ?>; background-position: center center">
                     <div class="container">
                        <div class="row">
                           <div class="col-xs-12 col-sm-8 col-md-6 ">
                              <div class="callout-feature-content" style="color:#ffffff">
                                 <h2 class="callout-feature-title" style="color:#ffffff">Want to learn more?(For institute)</h2>
                                 <p><a href="https://demo.astoundify.com/listify/how-it-works/" class="button">How It Works</a></p>
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