<style type="text/css">
  #page
  {
    width: 100%;
    margin-top: -20px;
  }
</style>
      <style type="text/css">
      .carousel {
  width: 100%;
}
         .carousel,.item,.active
         {
            width:100%;
         }
         .carousel-inner
         {
            width:100%;
         }
         .carousel .item img
         {
            width:100%;
         }
         #sample-institute-name
         {
          font-size: 40px;
          font-weight: bold;

         }
         #sample-batch-type
         {
           font-size: 22px;
          font-weight: normal;
            margin-bottom: 5px;
         }
         #sample-institute-address
         {
            font-size: 22px;
            font-weight: normal;
              margin-bottom: 5px;
         }
         #sample-institute-contact
         {
          font-size: 22px;
            font-weight: bold;
              margin-bottom: 5px;
         }
        #sample-institute-contact .glyphicon
         {
          font-size: 19px;
            font-weight: normal;  
         }
         #sample-batch-name
         {
            font-size: 30px;
            font-weight: normal;  
            margin-top: -40px;
           -webkit-box-shadow: 0px 3px 0px -2px #0099FF;
            box-shadow: 0px 3px 0px -2px #0099FF;
            text-align: center;
         }
         #sample-batch-details
         {
             -webkit-box-shadow: 0px 0px 4px  #0099FF;
            box-shadow: 0px 0px 4px  #0099FF;
            font-size: 20px;


         }
          #pin-icon
         {
          font-size: 20px;
          color: #0099FF;
          margin-left: 5px;
         }
         .batch-deatails
         {
          margin-top: 10px;
         }
         /*.modal.and.carousel 
         {
            position: absolute; 
         }*/
      </style> 
@extends('Layouts.layout')
@section('content')
<?php
  foreach ($batchDetails as $data) 
  {
      $instituteName = $data->institute;
      $instituteAddress = $data->venue_address;
      $instituteContact = $data->venue_contact_no;
      $batchName = $data->batch;
      $category = $data->category;
      $subcategory = $data->subcategory;
      $ageGroup = $data->batch_age_group;
      $gendeGroup = $data->batch_gender_group;
      $difficultyLevel = $data->batch_difficulty_level;
      $trailClass = $data->batch_trial;
      $sessionsCount = $data->batch_no_of_classes_in_week;
  }
?>
<div id="page" class="hfeed site">
   <div id="content" class="site-content">
      <div class="single_job_listing" itemscope="" itemtype="http://schema.org/LocalBusiness"  data-grid-columns="col-xs-12 col-sm-6">
         <div style="background-image: url(/assets/images/Stocksy_txp782c31421CE000_Medium_85879.jpg);" class="listing-cover content-single-job_listing-hero has-image">
            <div class="content-single-job_listing-hero-wrapper cover-wrapper container">
               <div class="content-single-job_listing-hero-inner row">
                  <div class="col-sm-8 col-md-9">
                    <div id='sample-institute-name'>{{$instituteName}}</div>
                    <div id='sample-batch-type'>{{'  '.$subcategory}},{{' '.$category}}</div>
                    <div id='sample-institute-address'><div class='glyphicon glyphicon-map-marker'></div>{{'  '.$instituteAddress}}</div>
                    <div id='sample-institute-contact'><div class='glyphicon glyphicon-phone-alt'></div>{{'  '.$instituteContact}}</div>
                  </div>
                  <div class="col-sm-4 col-md-3">
                    <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="job_listing-rating-wrapper" title="4 Reviews">
                       <span class="job_listing-rating-stars">
                          <span class="stars-rating">
                          </span>
                       </span>
                       <span class="job_listing-rating-count">
                          <span itemprop="reviewCount">4</span> 
                          Reviews  
                       </span>
                    </div>
                    <span class="wp-job-manager-bookmarks-count">
                       15 Favorites  
                    </span>
                    <div class="content-single-job_listing-actions-start">
                       <button  class="btn btn-primary">Share</button>
                       <button class="btn btn-primary">Submit a Review</button>
                    </div>
                 </div>
               </div>
            </div>
         </div>
         <div id="primary" class="container">
            <div class="row content-area">
               <main id="sample-batch-details" class="site-main col-md-7 col-sm-7 col-xs-12" role="main">
                  <aside id="listify_widget_panel_listing_content-2" class="widget widget-job_listing listify_widget_panel_listing_content">
                    <div id='sample-batch-name'>{{$batchName}} Details</div>
                    <div id='batch-session-count' class="batch-deatails"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
                      Sessions per Week: {{$sessionsCount}}
                    </div>
                    <div id='batch-openclass' class="batch-deatails"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
                      Trail Class:
                    </div>
                    <div id='batch-gender' class="batch-deatails"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
                      Gender:
                    </div>
                    <div id='batch-age-group' class="batch-deatails"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
                      Age Group:
                    </div>
                    <div id='batch-difficulty' class="batch-deatails"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
                      Difficulty Level:
                    </div>
                  </aside>
                  <aside id="listify_widget_panel_listing_content-2" class="widget widget-job_listing listify_widget_panel_listing_content">
                     <h1 class="widget-title widget-title-job_listing ">Accomplishment</h1>
                     <p>Different states in the US vary on their labor and licensing laws. For example, in Maryland, a cosmetologist cannot use a straight razor, strictly reserved for barbers. In contrast, in New Jersey both are regulated by the State Board of Cosmetology and there is no longer a legal difference in barbers and cosmetologists, as they are issued the same license and can practice both the art of straight razor shaving, colouring, other chemical work and haircutting if they choose.</p>
                     <p>In Australia, the official term for a barber is hairdresser; barber is only a popular title for men’s hairdressers, although not as popular now as it was in the middle of the 20th century. Most would work in a hairdressing salon.</p>
                  </aside>
                  <div id="comments" class="comments-area widget widget-job_listing">
                     
                     <div id="respond" class="comment-respond">
                        <h3 id="reply-title" class="comment-reply-title"><span class=""></span>Write a review <small><a rel="nofollow" id="cancel-comment-reply-link" href="/listify/listing/555-liberty-village-toronto-ontario-canada-astoundify-barbershop/#respond" style="display:none;">Cancel reply</a></small></h3>
                        <form  method="post" id="commentform" class="comment-form" novalidate="">
                           <div id="wpjmr-submit-ratings" class="review-form-stars">
                              <div class="star-ratings">
                                 <div class="rating-row">
                                    <label for="2">Rating</label>
                                    <div class="choose-rating" data-rating-category="2">
                                       <span data-star-rating="5" class="star dashicons dashicons-star-empty"></span>
                                       <span data-star-rating="4" class="star dashicons dashicons-star-empty"></span>
                                       <span data-star-rating="3" class="star dashicons dashicons-star-empty"></span>
                                       <span data-star-rating="2" class="star dashicons dashicons-star-empty"></span>
                                       <span data-star-rating="1" class="star dashicons dashicons-star-empty"></span>
                                       <input class="required" name="star-rating-2" value="" type="hidden">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <p class="comment-form-author">                                                                  
                              <div class="form-group">
                                <label for="exampleInputEmail1">Comment</label>
                                <textarea type="text" class="form-control" id="exampleInputEmail1" ></textarea>
                              </div>
                              <button type="submit" class="btn btn-default">Submit</button>
                            </form>                             
                </div>
                  </div>
               </main>
               <div id="secondary" class="widget-area col-md-5 col-sm-5 col-xs-12" role="complementary">
                  <aside id="listify_widget_panel_listing_tags-2" class="widget widget-job_listing listify_widget_panel_listing_tags">
                     <h1 class="widget-title widget-title-job_listing ">Institute Details</h1>
                     <p>A barber is a person whose occupation is mainly to cut, dress, groom, style and shave men’s and boys’ hair. A barber’s place of work is known as a “barber shop” or a “barber’s”. Barber shops are also places of social interaction and public discourse. In some instances, barbershops are also public forums. They are the locations of open debates, voicing public concerns, and engaging citizens in discussions about contemporary issues. They were also influential in helping shape male identity.</p>
                     <p>In previous times, barbers (known as barber surgeons) also performed surgery and dentistry. With the development of safety razors and the decreasing prevalence of beards, in English-speaking cultures, most barbers now specialize in cutting men’s scalp hair as opposed to facial hair.</p>
                     
                  </aside>
                  <aside id="listify_widget_panel_listing_social_profiles-3" class="widget widget-job_listing listify_widget_panel_listing_social_profiles">
                     <h1 class="widget-title widget-title-job_listing ">Social Profiles</h1>
                     <ul class="social-profiles">
                        <li><button class="btn btn-facebook"><i class="fa fa-facebook"></i> </button></li>
                        <li><a href="http://facebook.com/Astoundify" class="ion-social-facebook">Facebook URL</a></li>
                        <li><a href="https://plus.google.com/" class="ion-social-googleplus">Google+ URL</a></li>
                        <li><a href="http://pinterest.com/Astoundify" class="ion-social-pinterest">Pinterest URL</a></li>
                        <li><a href="http://linkedin.com/Astoundify" class="ion-social-linkedin">LinkedIn URL</a></li>
                        <li><a href="http://github.com/Astoundify" class="ion-social-github">GitHub URL</a></li>
                     </ul>
                  </aside>
                  <aside id="listify_widget_panel_listing_gallery-2" class="widget widget-job_listing listify_widget_panel_listing_gallery">
                     <h1 class="widget-title widget-title-job_listing ">
                        <a   data-toggle="modal" data-target="#myModal">
                           Launch demo modal
                        </a>
                     </h1>
                     <ul class="listify-gallery-images">
                        <li class="gallery-preview-image" >
                           <a data-toggle="modal" data-target="#myModal">
                              <img src="https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/306-150x150.jpg">
                           </a>
                        </li>
                        <li class="gallery-preview-image" >
                           <a data-toggle="modal" data-target="#myModal">
                              <img src="https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/306-150x150.jpg">
                           </a>
                        </li>
                        <li class="gallery-preview-image" >
                           <a data-toggle="modal" data-target="#myModal">
                              <img src="https://demo.astoundify.com/listify/wp-content/uploads/sites/39/2014/11/306-150x150.jpg">
                           </a>
                        </li>
                     </ul>
                     
                  </aside>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="sharing_email" style="display: none;">
   <form action="" method="post">
      <label for="target_email">Send to Email Address</label>
      <input name="target_email" id="target_email" value="" type="email">
      <label for="source_name">Your Name</label>
      <input name="source_name" id="source_name" value="" type="text">
      <label for="source_email">Your Email Address</label>
      <input name="source_email" id="source_email" value="" type="email">
      <img style="float: right; display: none" class="loading" src="https://demo.astoundify.com/listify/wp-content/plugins/jetpack/modules/sharedaddy/images/loading.gif" alt="loading" height="16" width="16">
      <input value="Send Email" class="sharing_send" type="submit">
      <a href="#cancel" class="sharing_cancel">Cancel</a>
      <div class="errors errors-1" style="display: none;">
         Post was not sent - check your email addresses!  
      </div>
      <div class="errors errors-2" style="display: none;">
         Email check failed, please try again 
      </div>
      <div class="errors errors-3" style="display: none;">
         Sorry, your blog cannot share posts by email.  
      </div>
   </form>
</div>
@stop