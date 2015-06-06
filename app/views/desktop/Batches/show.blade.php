@extends('Layouts.layout')
@section('pagestylesheet')
  <style type="text/css">
     #page 
     {
      width: 100%;
      margin-top: 0px;

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
      font-size: 25px;
      font-weight: normal; 
      -webkit-box-shadow: 0px 3px 0px -2px #0099FF;
      box-shadow: 0px 3px 0px -2px #0099FF;
      text-align: center;
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
      background:#f0f3f6;
      width:100%;
    }
    .sample-box
    {
      background: white;
      margin-top: 30px;
       webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
      box-shadow: inset 0 0 2px rgba(0,0,0,.3);
      -moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);   
    }
    .sample-box-small
    {
      background: white;
      margin-top: 30px;
      padding:20px 30px 30px 30px;
       webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
      box-shadow: inset 0 0 2px rgba(0,0,0,.3);
      -moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
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
  .batchOrderField
  {
    margin-top: 10px;
    font-size: 15px;
    text-align: left;
  }
  #batchOrderSample select
  {
    height: 25px;
    padding: 0px 0px 0px 5px;
    width: 85%;
  }
  #batchOrderSample input
  {
    height: 25px;
    padding: 0px 0px 0px 5px;
    width: 85%;
  }
  #bookOrderFormStep2 { display: none;padding-top: 20px;  }

  #bookOrderFormStep2 {}

  #related_data_container
  {
    border-top: 1px solid lightgrey; 
    padding: 20px 5%;
    width: 100%;    
  }
  #related_data_container h4 {font-size: 18px;color: #202e54;font-weight: bold;margin:0px 0px 5px 0px;}

  .related_item {margin-bottom: 15px;}

  .related_item a {color:#5C5C5C;}

  .help-block {color: #a94442 !important}

  </style> 
@stop
@section('content')
<?php
  foreach ($batchDetails as $data) 
  {
    date_default_timezone_set("Asia/Calcutta");
    $batchID = $data->id;
    $instituteName = $data->institute;
    $instituteAddress = $data->venue_address;
    $instituteContact = $data->venue_contact_no;
    $instituteID = $data->batch_institute_id;
    $batchName = $data->batch;
    $category = $data->category;
    $sessionPrice = $data->batch_single_price;
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
    $locality_id = $data->venue_locality_id; 
    $locality =  $data->locality;
    $todayDate = date('Y-m-d');
  }
  $relatedContent = null;
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
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="col-md-6 col-sm-7 col-xs-12 col-md-offset-1">
      <div id="sample-batch-details" class="sample-box col-md-12 col-sm-12 col-xs-12" >
        <div id='sample-batch-name'>{{$batchName}} Details</div>
        <div id='batch-session-count' class="batch-details"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
          Sessions per Week: {{$sessionsCount}}
        </div>
        <!--<div id='batch-openclass' class="batch-details"><i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
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
        </div> -->
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
          <div class="form-group" id="ReviewForm">
            <label for="comment">Review:</label>
            <textarea class="form-control" rows="3" name='comment' id="comment" required='required'></textarea>
          </div>
          @if($loggedIn)
            <button type="submit" class="btn btn-primary">Submit</button>              
          @else
            <button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-primary">Submit</button>           
          @endif
        </form>
      </div>
    </div>
   
    <div class='col-md-4 col-sm-5 col-xs-12 column'>
      <div class="sample-box-small" id='batchOrderSample'>
        <div id='sample-batch-name'>Book This Class</div>
        <form role="form" method="post" name="batchOrderForm" id="batchOrderForm" action="/bookings" > 
          <div class="" id="bookOrderFormStep1">
            <input type="hidden" name="batch_id" value="{{$batchID}}">
            <div class="row batchOrderField">
              <div class='col-md-6 col-sm-6 col-xs-6'>Price Per Session</div>
              <div class='col-md-6 col-sm-6 col-xs-6'>: Rs. {{$sessionPrice}}</div>
            </div>
            <div class="row batchOrderField">
              <div class='col-md-6 col-sm-6 col-xs-6'>No. of Sessions*</div>
              <div class='col-md-6 col-sm-6 col-xs-6'>  
                  <select class="form-control" id="numberOfSessions" name="no_of_sessions">                 
                      @for($session=1;$session<=6;$session++)
                          <option value={{$session}}>{{$session}}</option>
                      @endfor
                  </select>
              </div>
            </div>
            <div class="row batchOrderField" id="batchOrderField1">
              <div class='col-md-6 col-sm-6 col-xs-6'>Booking Date*</div>
              <div class='col-md-6 col-sm-6 col-xs-6'>
                    <input type="date" placeholder="Select Date" min="{{$todayDate}}" class="form-control" id="booking_date" name="booking_date" />                     
              </div>          
            </div>    
            <div class="row batchOrderField">
              <div class='col-xs-9'>
                <input type="text" style="width:100%" placeholder="Enter Promo Code" class="form-control" id="promoCode" name="Promo Code" />                     
              </div>
              <div class='col-xs-3' style="text-align:left;padding:1px 0px 1px 0px;font-size:15px;">
                 <a href="javascript:verifyPromoCode();">Apply</a>
              </div>          
            </div>       
            <hr/>
            <div class="row totalAmount">
              <div class="">Amount Payable<span id="orderTotal">: Rs. {{$sessionPrice}}</span></div>
              <input type="hidden" id="payment" name="payment" value="{{$sessionPrice}}">
            </div>
            <div class="row batchOrderButtons">    
              <button style="padding:5px 70px;" class="booknowButton" id="proceedButton">Proceed</button>
              <!-- <a href=""><div class="col-md-7 col-sm-12 col-xs-12 payNowButton payNowButton1">Hobbyix Passport</div></a> -->
            </div>
          </div>
          <div class="" id="bookOrderFormStep2">
            <div class="row batchOrderField">
              <div class='col-md-5 col-sm-4 col-xs-5'>E-Mail ID*</div>
              <div class='col-md-7 col-sm-8 col-xs-7'>
                    <input type="email" placeholder="Enter E-Mail ID" class="form-control" id="email" name="email" required />                     
              </div>          
            </div>   
            <div class="row batchOrderField">
              <div class='col-md-5 col-sm-4 col-xs-5'>Mobile Number*</div>
              <div class='col-md-7 col-sm-8 col-xs-7'>
                    <input type="tel" placeholder="Enter Mobile Number" class="form-control" id="contact_no" name="contact_no" required />                     
              </div>          
            </div> 
             <hr/>   
            <div class="row batchOrderButtons">    
              <button type="submit" style="padding:5px 70px;" class="booknowButton" id="booknowButton" >Pay Now</button>
              <!-- <a href=""><div class="col-md-7 col-sm-12 col-xs-12 payNowButton payNowButton1">Hobbyix Passport</div></a> -->
            </div>
          </div>
        </form>
        <!---
        <form method="post" action="/promos/isValid" enctype="multipart/form-data">
          <input type="hidden" id="csrf_token" name="csrf_token" value="{{csrf_token()}}">
          <input type="checkbox" id ="promo" name="promo">
          <label for="promo">I have a promo code</label>
          <input type="text" id="promo_code" name="promo_code">
          <input type="submit">
        </form> -->
      </div>
      <div class="sample-box-small" id='institute-details'>
         <div id='sample-batch-name'>Institute Details</div>
         <span id='sample-details' class="details-container">{{$instituteDetails}}</span>    
      </div>
     <!--<div id='sample-social-profiles' class="sample-box-small">
       <div id='sample-batch-name'>Social Profiles</div>
          <div class="social-profiles-container">
            <a href="{{$twitterLink}}" class="sample-social-twitter"><img src="/assets/images/sample/twitter.jpg"></a>
            <a href="{{$facebookLink}}" class="sample-social-facebook"><img src="/assets/images/sample/facebook.jpg"></a>
           <a href="https://plus.google.com/" class="sample-social-googleplus"><img height="42px" src="/assets/images/sample/googleplus.jpg"></a>
          <a href="http://linkedin.com/Astoundify" class="sample-social-linkedin"><img src="/assets/images/sample/linkedin.jpg"></a></center> 
          </div>
      </div> -->
      <div id='sample-demo-model'  class="sample-box-small" style="display:none">
        <div id='sample-batch-name'>Gallery</div>     
        <ul class="listify-gallery-images">
          <li class="gallery-preview-image" >
             <a data-toggle="modal" data-target="#myModal"> </a>
          </li>
          <li class="gallery-preview-image" >
             <a data-toggle="modal" data-target="#myModal"> </a>
          </li>
          <li class="gallery-preview-image" >
             <a data-toggle="modal" data-target="#myModal"> </a>
          </li>
        </ul>              
      </div>
    </div>
  </div> 
</div>
<div class="container" id="related_data_container">
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 related_item">
        <h4>Related to {{$instituteName}}</h4>       
        <?php
          $institutesLength = sizeof($batchesOfInstitute);
          $index = 0;
          $maxlength = 12;
          $colNum = 3;
          $width = 4;
          if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }        
          $listLength = $maxlength / $colNum;
        ?>
        @for($col = 0;$col<=$colNum;$col++ )
          <div class="col-md-{{$width}} col-sm-{{$width}} col-xs-12 ">
            @for(; $index<$listLength && $index<$maxlength; $index++ )
              <li title="{{$batchesOfInstitute[$index]->subcategory}}, {{$batchesOfInstitute[$index]->institute}}, {{$batchesOfInstitute[$index]->locality}} - {{$batchesOfInstitute[$index]->location}}">
                <a href="/batches/show/{{$batchesOfInstitute[$index]->id}}">
                  {{$batchesOfInstitute[$index]->subcategory}}, {{$batchesOfInstitute[$index]->institute}}
                </a>
              </li>
            @endfor
            <?php
              $listLength += $listLength;
            ?>  
          </div>          
        @endfor           
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 related_item">
        <h4>Other {{$subcategory}} classes</h4>
        <?php
          $institutesLength = sizeof($institutesOfSubcategoryInLocality);
          $index = 0;
          $maxlength = 12;
          $colNum = 3;
          $width = 4;
          if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }        
          $listLength = $maxlength / $colNum;
        ?>
        @for($col = 0;$col<=$colNum;$col++ )
          <div class="col-md-{{$width}} col-sm-{{$width}} col-xs-12">
            @for(; $index<$listLength && $index<$maxlength; $index++ )
              <li title="{{$institutesOfSubcategoryInLocality[$index]->institute}}">
                <a href="/filter/institute/{{$institutesOfSubcategoryInLocality[$index]->id}}">
                  {{$institutesOfSubcategoryInLocality[$index]->institute}}
                </a>
              </li>
            @endfor
            <?php
              $listLength += $listLength;
            ?>  
          </div>          
        @endfor   
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 related_item">
        <h4>{{$category}} classes in {{$locality}}</h4>
        <?php
          $institutesLength = sizeof($subcategoriesInLocality);
          $index = 0;
          $maxlength = 12;
          $colNum = 3;
          $width = 4;
          if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }        
          $listLength = $maxlength / $colNum;
        ?>
        @for($col = 0;$col<=$colNum;$col++ )
          <div class="col-md-{{$width}} col-sm-{{$width}} col-xs-12">
            @for(; $index<$listLength && $index<$maxlength; $index++ )
              <li title="{{$subcategoriesInLocality[$index]->subcategory}} classes in {{$locality}}">
                <a href="/filter/{{$subcategoriesInLocality[$index]->id}}/{{$locality_id}}">
                  {{$subcategoriesInLocality[$index]->subcategory}} classes in {{$locality}}
              </li>
            @endfor
            <?php
              $listLength += $listLength;
            ?>  
          </div>          
        @endfor   
      </div>
  </div>
</div>

@stop
@section('pagejquery')
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript"> 
  function bookOrderFormValidate() 
  {
    var Result = true;    
    var bookingDate = $('#booking_date').val();
    if(bookingDate=="" || bookingDate==undefined)
    {
      Result =  false;
      var errorMessageContainer = $('#booking_date').parent(),baseUrl;
      $('#errorMessage').remove();     
      $('<span></span>')
        .attr("id","errorMessage")
        .attr("class","batchCreateFormError")
        .text("Booking date is required")
        .appendTo(errorMessageContainer);      
    }
    return Result;
  }
  $(document).ready(function () 
  {
      $("#booking_date").change(function () {
          $('#errorMessage').remove();     
      });
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
      $('#numberOfSessions').change(function () 
      {
          var sessionsCount = $(this).val(); 
          var sessionPrice = {{$sessionPrice}};
          var subtotal = sessionPrice*sessionsCount;
          $('#orderSubtotal').empty();  
          $('#orderSubtotal').append(": Rs. "+subtotal);
          $('#orderTotal').empty();  
          $('#orderTotal').append(": Rs. "+subtotal);          
      });
      $('#SubmitReviewButton').bind('click', function(event) 
      {
        var height = $("#ReviewForm").position().top + 200;
        $('html, body').stop().animate({
         scrollTop : height
        }, 1000, 'easeInOutSine');
        event.preventDefault();
      });
      /*$("#datepicker").datepicker({
      /*showOn: 'both',
      buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
            buttonText: "Choose Date",*
            dateFormat: 'yy-mm-dd'         
      }); */     
      $('#proceedButton').click(function(e)
      {  
        e.preventDefault();       
        e.stopPropagation();         
        if(bookOrderFormValidate())
        {   
          $("#bookOrderFormStep1").hide();
          $("#bookOrderFormStep2").fadeIn();              
        }      
      });  
      $('#batchOrderForm').bootstrapValidator({                    
            fields: {

                contact_no: {                       
                        validators: {
                            notEmpty: {
                                message: 'Mobile number is required'
                            },

                            regexp: {
                                regexp: /^[0-9]{10}$/,
                                message: 'The mobile number consists of 10 digits. Skip adding +91 or 0'
                            }
                        }
                    },

                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email is required'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                }
            }
      });   

  });
</script>
@stop