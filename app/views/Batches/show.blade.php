@extends('Layouts.layout')
@section('pagestylesheet')
  <style type="text/css">
    #page
    {
      width: 100%;
      margin-top: -20px;

    }
  </style>
  <style type="text/css">

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

      -webkit-box-shadow: 0px 3px 0px -2px #0099FF;
      box-shadow: 0px 3px 0px -2px #0099FF;
      text-align: center;
      font-weight: bold;
    }
    #secondary
    {
      box-shadow: 1px 1px 10px rgba(0,0,0,0.5);-moz-box-shadow: 1px 1px 10px rgba(0,0,0,0.5);
      -webkit-box-shadow: 1px 1px 10px rgba(0,0,0,0.5);
      font-size: 20px;
      margin-left: 50px;
      padding:20px 30px 20px 30px;
    }
    #sample-batch-details
    {
      font-size: 20px;
      padding:20px 60px 20px 60px;

      margin-bottom: 50px;
          padding-bottom: 50px;

    }

    #comments
    {
      clear: both;
      margin-top: 50px;
      font-size: 20px;
      padding:20px 60px 20px 60px;
      width: 100%;
      margin-bottom: 50px;
      padding-bottom: 40px;

    }
    #sample-details 
    {
        font-size: 18px;
    }
    #blog-container
    {
      background:#f0f3f6;width:100%;
    }
    .sample-box
    {
      background: white;
      margin-top: 30px;
      box-shadow: 2px 2px 2px -2px rgba(0,0,0,0.5);-moz-box-shadow: 2px 2px 2px -2px rgba(0,0,0,0.5);
      -webkit-box-shadow: 2px 2px 2px -2px rgba(0,0,0,0.5);
      border-radius: 7px;
    }
    .sample-box-small
    {
      background: white;
      margin-top: 30px;
      padding:20px 30px 40px 30px;
      box-shadow: 2px 2px 2px -2px rgba(0,0,0,0.5);-moz-box-shadow: 2px 2px 2px -2px rgba(0,0,0,0.5);
      -webkit-box-shadow: 2px 2px 2px -2px rgba(0,0,0,0.5);
      border-radius: 7px;
    }

    #pin-icon
    {
      font-size: 20px;
      color: #0099FF;
      margin-left: 5px;
    }
    .batch-details
    {
      margin-top: 10px;
    }
    #sample-batch-description
    {
      margin-top: 30px;
    }
    #sample-batch-accomplishment
    {
      margin-top: 30px;
    }
    #sample-social-profiles
    {
      margin-top: 40px;
    }
    #sample-demo-model
    {
      margin-top: 40px;
    }
   .rating {
        overflow: hidden;
        display: inline-block;
    }
    .rating-input {
        float: right;
        width: 16px;
        height: 16px;
        padding: 0;
        margin: 0 0 0 -16px;
        opacity: 0;
    }
   .rating-star {
        position: relative;
        float: right;
        display: block;
        width: 16px;
        height: 16px;
        background: url(/assets/images/sample/star.png) 0 -16px;
    }

    .rating-star:hover,
    .rating-star:hover ~ .rating-star,
    .rating-input:checked ~ .rating-star {
        background-position: 0 0;
    }
    #sample-social-profiles img
    {
        width: 50px;
        height: 53px;
        margin-right: 5px;
    }
    .samplePageInfo
    {
      background: rgba(0, 0, 0, 0.4);
      color: white;
    }
    .submitReviewButton
    {
      text-align: center;   
      padding-bottom: 10px;  
    }
    @media (min-width:768px) {
    .submitReviewButton {
        padding: 4.5em 0 2em;
    }
}
  .social-profiles-container
  {
    margin-top: 15px;
    text-align: center;
  }
  .details-container
  {
    margin-top: 15px;
  }



  </style> 
@stop
@section('content')
<?php
  foreach ($batchDetails as $data) {
    $instituteName = $data->institute;
    $instituteAddress = $data->venue_address;
    $instituteContact = $data->venue_contact_no;
    $instituteID = $data->batch_institute_id;
    $batchName = $data->batch;
    $category = $data->category;
    $subcategory = $data->subcategory;
    $ageGroup = $data->batch_age_group;
    $genderGroup = $data->batch_gender_group;
    $difficultyLevel = $data->batch_difficulty_level;
    $trialClass = $data->batch_trial;
    $sessionsCount = $data->batch_no_of_classes_in_week;
    $batchDescription = $data->batch_comment;
    $batchAccomplishment = $data->batch_accomplishment;
    $instituteDetails = $data->institute_description;
    $facebookLink = $data->institute_fblink;
    $twitterLink = $data->institute_twitter;    
  }
?>

<div id="page" class="hfeed site" style="background-image: url(/assets/images/sample/Stocksy_txp782c31421CE000_Medium_85879.jpg);">
  <div id="content" class="site-content">
    <div class="samplePageInfo cover-wrapper ">
      <div class="container">
        <div class="col-sm-10 col-md-10">
          <div id='sample-institute-name'>{{$instituteName}}</div>
          <div id='sample-batch-type'>{{'  '.$subcategory}},{{' '.$category}}</div>
          <div id='sample-institute-address'><div class='glyphicon glyphicon-map-marker'></div>{{'  '.$instituteAddress}}</div>
          <div id='sample-institute-contact'><div class='glyphicon glyphicon-phone-alt'></div>{{'  '.$instituteContact}}</div>
        </div>
        <div class="col-sm-2 col-md-2">
          <div class="submitReviewButton">
             <!-- <button  class="btn btn-primary">Share</button> -->
             <a id="SubmitReviewButton" class="btn btn-primary">Submit a Review</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container" id='blog-container'>
  <div class="row clearfix">
    <div class="col-md-1 column"></div>
  <div class="col-md-11 column">
    <div class="col-md-7 col-sm-12 col-xs-12 column ">
      <div id="sample-batch-details" class="sample-box col-md-12 col-sm-12 col-xs-12" >
        <div id='sample-batch-name'>{{$batchName}} Details</div>
        <div id='batch-session-count' class="batch-details"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
          Sessions per Week: {{$sessionsCount}}
        </div>
        <div id='batch-openclass' class="batch-details"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
          Trial Class: {{$trial[$trialClass]}}
        </div>
        <div id='batch-gender' class="batch-details"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
          Gender:{{' '.$gender_group[$genderGroup]}}
        </div>
        <div id='batch-age-group' class="batch-details"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
          Age Group: {{' '.$age_group[$ageGroup]}}
        </div>
        <div id='batch-difficulty' class="batch-details"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
          Difficulty Level: {{' '.$difficulty_level[$difficultyLevel]}}
        </div>
        <div id='sample-batch-description' >
          <div id='sample-batch-name'>Batch Description</div>
          <p id='sample-details' class="details-container">{{$batchDescription}}</p>
        </div>
        <div id="sample-batch-accomplishment">
          <div id='sample-batch-name'>Accomplishment</div>
           <p id='sample-details' class="details-container"> {{$batchAccomplishment}}</p>
        </div>
      </div>
      <div id="comments" class="sample-box">
        <div id='sample-batch-name'>Write a Review</div>
        <form  action='/comments/store/' method='post' id="commentsForm" enctype="multipart/form-data" method="post" id="commentform" class="comment-form details-container" novalidate="">
          <div class="form-group" id='rating-input'>
                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                <input type="hidden" name="comment_institute_id" value="{{$instituteID}}">
              <span class="rating" >
              @for($index = 5; $index > 0;$index--)
                <input type="radio" class="rating-input" required='required'
                    id="rating-input-1-{{$index}}" value="{{$index}}" name="comment_rating">
                <label for="rating-input-1-{{$index}}" class="rating-star"></label>
              @endfor
               <label for="rating" style="float:right;margin-right:20px;margin-top:-7px">Rate this Batch:</label>
            </span>                                                            
          </div>  
          <div class="form-group">
            <label for="comment">Review:</label>
            <textarea class="form-control" rows="3" name='comment' id="comment" required='required'></textarea>
          </div>
          @if($loggedIn)
            <button type="submit" class="btn btn-primary">Submit</button>              
          @else
            <button type="button" data-toggle="modal" data-target="#loginModal" id="submit-btn" class="btn btn-primary">Submit</button>           
          @endif
        </form>               
      </div>
    </div>
   
    <div class='col-md-4 col-sm-12 col-xs-12 column'>
      <div class="sample-box-small" id='institute-details'>
         <div id='sample-batch-name'>Institute Details</div>
         <span id='sample-details' class="details-container">{{$instituteDetails}}</span>    
      </div>
     <div id='sample-social-profiles' class="sample-box-small">
       <div id='sample-batch-name'>Social Profiles</div>
          <div class="social-profiles-container">
            <a href="{{$twitterLink}}" class="sample-social-twitter"><img src="/assets/images/sample/twitter.jpg"></a>
            <a href="{{$facebookLink}}" class="sample-social-facebook"><img src="/assets/images/sample/facebook.jpg"></a>
         <!-- <a href="https://plus.google.com/" class="sample-social-googleplus"><img height="42px" src="/assets/images/sample/googleplus.jpg"></a>
          <a href="http://linkedin.com/Astoundify" class="sample-social-linkedin"><img src="/assets/images/sample/linkedin.jpg"></a></center> -->
          </div>
      </div>
      <div id='sample-demo-model'  class="sample-box-small">
        <div id='sample-batch-name'>Gallery</div>     
        <ul class="listify-gallery-images">
          <li class="gallery-preview-image" >
             <a data-toggle="modal" data-target="#myModal">
               
             </a>
          </li>
          <li class="gallery-preview-image" >
             <a data-toggle="modal" data-target="#myModal">
               
             </a>
          </li>
          <li class="gallery-preview-image" >
             <a data-toggle="modal" data-target="#myModal">
                
             </a>
          </li>
        </ul>              
      </div>
    </div>
     <div class="col-md-1 column"></div>
  </div>
  </div>
</div>
@stop
@section('pagejquery')
<script type="text/javascript">
  $(document).ready(function () 
  {
      var categoryId = "<?php echo $loggedIn; ?>";     
      $('.rating-input').attr('checked', false);
      $('#commentsForm').click(function(e)
      {
        if(categoryId=="")
        {
          e.preventDefault();
          e.stopPropagation();
          $('#loginModal').modal('show') ;
        }
      });
  });
  $(function() {
    $('#SubmitReviewButton').bind('click', function(event) {
      $('html, body').stop().animate({
        'scrollTop' : $("#submit-btn").position().top + 85
      }, 1000, 'easeInOutExpo');
      event.preventDefault();
    });
  });
</script>
@stop