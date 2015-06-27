@extends('Layouts.layout')
@section('pagestylesheet')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <style type="text/css">
    #page { width: 100%;margin-top: 0px; background-repeat:no-repeat;background-position:left center;-o-background-size: cover;
        -moz-background-size: cover;-webkit-background-size: cover;background-size: cover;
    }

    #sample-institute-name { font-size: 40px;font-weight: bold;margin: 5px 0px; }

    #sample-batch-type { font-size: 22px;font-weight: normal;margin: 0px 0px 10px 0px; }

    #sample-institute-address { font-size: 22px;font-weight: normal;margin-bottom: 5px; }

    #sample-institute-contact { font-size: 22px;font-weight: bold;margin-bottom: 5px; }

    #sample-institute-contact .glyphicon { font-size: 19px; font-weight: normal; }

    #sample-batch-name { font-size: 25px;font-weight: normal;-webkit-box-shadow: 0px 3px 0px -2px #0099FF;box-shadow: 0px 3px 0px -2px #0099FF;text-align: center; }

    #secondary { box-shadow: 1px 1px 10px rgba(0,0,0,0.5);-moz-box-shadow: 1px 1px 10px rgba(0,0,0,0.5);-webkit-box-shadow: 1px 1px 10px rgba(0,0,0,0.5);
      font-size: 20px;margin-left: 50px;padding:20px 30px 20px 30px;
    }

    #sample-batch-details { font-size: 16px;padding:20px 60px 20px 60px;margin-bottom: 30px;padding-bottom: 50px;  }

    #comments  {  clear: both;font-size: 20px;padding:20px 60px 20px 60px;width: 100%;margin-bottom: 50px;padding-bottom: 40px; }

    #sample-details { font-size: 18px; }

    #blog-container { background:#f0f3f6;width:100%; }

    .sample-box  { background: white;margin-top: 30px;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3); }

    .sample-box-small { background: white;margin-top: 30px;padding:20px 30px 30px 30px;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);}

    .pin-icon { font-size: 16px;color: #0099FF;margin: 5px 5px 0px 0px; }

    #batch-facilities {text-align: center;margin-top: 20px;}

    .batch-details { margin-top: 10px; }

    .batch-details .glyphicon { color: #0099FF;margin: 10px 5px 0px 0px;}

    #sample-batch-description { margin-top: 30px; }

    #sample-batch-accomplishment { margin-top: 30px; }

    #sample-social-profiles { margin-top: 40px; }

    #sample-demo-model  { margin-top: 40px;  }

    .rating { overflow: hidden;display: inline-block; }

    .rating-input { float: right;width: 16px;height: 16px;padding: 0;margin: 0 0 0 -16px;opacity: 0;}

    .rating-star { position: relative;float: right;display: block;width: 16px;height: 16px;background: url(/assets/images/sample/star.png) 0 -16px; }

    .rating-star:hover,.rating-star:hover ~ .rating-star,.rating-input:checked ~ .rating-star { background-position: 0 0; }

    #sample-social-profiles img { width: 50px;height: 53px;margin-right: 5px;}

    .samplePageInfo {background: rgba(0, 0, 0, 0.4);color: white;}

    .submitReviewButton { text-align: center;padding-bottom: 10px; }

    @media (min-width:768px) { .submitReviewButton { padding: 4.5em 0 2em; } }

    .social-profiles-container { margin-top: 15px;text-align: center; }

    .details-container {margin-top: 15px;}

    .batchOrderField {margin-top: 10px;font-size: 15px;text-align: left;}
    
    #batchOrderSample select { height: 25px; padding: 0px 0px 0px 5px;width: 85%; }

    #batchOrderSample input {  height: 25px; padding: 0px 0px 0px 5px; width: 85%; }

    #bookOrderFormStep2 { display: none;padding-top: 20px;  }

    #related_data_container { border-top: 1px solid lightgrey;padding: 20px 5%;width: 100%; }

    #related_data_container h4 {font-size: 18px;color: #202e54;font-weight: bold;margin:0px 0px 5px 0px;}

    .related_item {margin-bottom: 15px;}

    .related_item a {color:#5C5C5C;}

    .help-block {color: #a94442 !important}

    .facilities_icon {margin-right: 5px;}

    #promoCodeContainer #statusMessage {color: #e24648;font-size: 14px;}

    ul{margin: 0px;}

  </style> 
@stop
@section('content')
  <?php
      $batchID = $batchDetails->id;
      $instituteName = $batchDetails->institute;
      $instituteAddress = $batchDetails->venue_address;
      $instituteContact = $batchDetails->venue_contact_no;
      $instituteID = $batchDetails->batch_institute_id;
      $batchName = $batchDetails->batch;
      $category = $batchDetails->category;
      $sessionPrice = $batchDetails->batch_single_price;
      $subcategory = $batchDetails->subcategory;
      $ageGroup = $batchDetails->batch_age_group;
      $genderGroup = $batchDetails->batch_gender_group;
      $comment = $batchDetails->batch_comment;
      $tagline = $batchDetails->batch_tagline;
      $sessionsCount = $batchDetails->batch_no_of_classes_in_week;
      $batchAccomplishment = $batchDetails->batch_accomplishment;
      $instituteDetails = $batchDetails->institute_description;
      $facebookLink = $batchDetails->institute_fblink;
      $twitterLink = $batchDetails->institute_twitter; 
      $locality_id = $batchDetails->venue_locality_id; 
      $locality =  $batchDetails->locality;
      $pincode =  $batchDetails->venue_pincode;
      $landMark = $batchDetails->venue_landmark;
      $location = $batchDetails->location;
      $facilitiesName = ["Air Conditioning","Cafe","Changing Room","Locker","Shower Room","Steam"];
      $facilitiesImageName = ["Air%20Conditioning","Cafe","Changing%20Room","Locker","Shower%20Room","Steam"];
      $facilities = ["air_conditioning","cafe","locker","locker","shower_room","steam"];
      $facilitesAvailable = [];
      for ($i=0; $i < 6 ; $i++) 
      { 
        $facilitesAvailable[$i] = $batchDetails->$facilities[$i];      
      }
      $weekDays = ["sunday","monday","tuesday","wednesday","thursday","friday","saturday"];
      $weekDaysAvailable = [];
      for ($i=0; $i < 7 ; $i++) 
      { 
        $weekDaysAvailable[$i] = $batchDetails->$weekDays[$i];   
      }      
      $todayDate = date('Y-m-d');
  ?>
  <div id="page" class="hfeed site" style="background-image: url(/assets/images/sample/workout.jpg);">
    <div id="content" class="site-content">
      <div class="samplePageInfo cover-wrapper ">
        <div class="container">
          <div class="col-sm-10 col-md-10" itemscope itemtype="http://schema.org/SportsActivityLocation">
            <h1 id='sample-institute-name' title="Name of the Institute is {{$instituteName}}" itemprop="name" >{{$instituteName}}</h1>
            <h2 id='sample-batch-type' title="{{$instituteName}} Subcategory and Category">{{'  '.$subcategory}},{{' '.$category}}</h2>
            <div id='sample-institute-address' title="Landmark, Locality and Location of {{$instituteName}}" class="text_over_flow_hide">
              <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                <span class='glyphicon glyphicon-map-marker'></span>
                <span itemprop="streetAddress">{{'  '.$landMark}}</span>, 
                <span itemprop="addressLocality">{{$locality.', '.$location}}</span>
              </div>
            </div>
            <div id='sample-institute-contact' title="{{$instituteName}} Contact Number">
              <div class='glyphicon glyphicon-phone-alt'></div><span itemprop="telephone">{{'  +91 '.$instituteContact}}</span>
            </div>
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
      <div class="col-md-6 col-sm-7 col-xs-12 col-md-offset-1" style="margin-bottom:15px">
        <div class="sample-box col-md-12 col-sm-12 col-xs-12" id="sample-batch-details" >
          <div itemscope itemtype="http://schema.org/SportsActivityLocation">          
            <div id='sample-batch-name'><span itemprop="name" >{{$instituteName}}</span> Details</div> 
            <div title="Complete Address of {{$instituteName}}" class="batch-details" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
              <span class='glyphicon glyphicon-home pin-icon' ></span>
              <span itemprop="streetAddress">{{$instituteAddress}}</span>, 
              <span itemprop="addressLocality">{{$locality.', '.$location}}</span>,
              <span itemprop="postalCode">{{$pincode}}</span>      
            </div>
            <div title="Landmark of {{$instituteName}}" @if(!isset($landMark)) style="display:none" @endif id='batch-session-count' class="batch-details"><span class='glyphicon glyphicon-map-marker'></span>
              Land Mark: {{$landMark}}
            </div>
            <div title="{{$instituteName}} Contact Number" class="batch-details"><span class='glyphicon glyphicon-phone-alt'></span>
              <span itemprop="telephone">+91 {{$instituteContact}}</span>
            </div>
            <div title="Timings of {{$instituteName}}" class="batch-details"><span class='glyphicon glyphicon-time'></span>
              {{$comment.' '.$tagline}}
            </div>
            <div id='batch-facilities' class="batch-details">
              @for($i=0;$i<=5;$i++)            
                  <span class="facilities_icon">
                    <img src="/assets/images/Facilities/{{$facilitiesImageName[$i]}}.png" width="35" height="35" alt="{{$facilitiesName[$i]}}" @if($facilitesAvailable[$i]==0) title="{{$facilitiesName[$i]}} is not Available" style="opacity:.2" @else title="{{$facilitiesName[$i]}} is Available" @endif >
                  </span>           
              @endfor
            </div>
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
      <div class='col-md-4 col-sm-5 col-xs-12 column' style="margin-bottom:25px">
        <div class="sample-box-small" id='batchOrderSample'>
          <div id='sample-batch-name'>Book This Class</div>
          <form role="form" method="post" name="batchOrderForm" id="batchOrderForm" action="/bookings" > 
            <div class="" id="bookOrderFormStep1">
              <input type="hidden" name="batch_id" value="{{$batchID}}">
              <div class="row batchOrderField">
                <div class='col-md-6 col-sm-6 col-xs-6'>Price Per Session</div>
                <div class='col-md-6 col-sm-6 col-xs-6'>: Rs. {{$sessionPrice}} or {{$batchDetails->batch_credit}} Credit</div>
              </div>
              <!-- <div class="row batchOrderField">
                <div class='col-md-6 col-sm-6 col-xs-6'>Hobbyix Credits/Session</div>
                <div class='col-md-6 col-sm-6 col-xs-6'>: </div>
              </div> -->
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
                      <input type="text" placeholder="Select Date" class="form-control" id="booking_date" name="booking_date" />                     
                </div>          
              </div>
              <?php
                $amountPayable = $sessionPrice;
                if(isset($user->user_wallet) && $user->user_wallet>0)                
                {
                    if($user->user_wallet>=$sessionPrice)
                    {
                      $amountPayable = 0;
                      $wallet_amount = $sessionPrice;
                    }
                    else
                    {
                      $wallet_amount = $user->user_wallet;
                      $amountPayable = $sessionPrice-$wallet_amount; 
                    }
                }
                else
                  $wallet_amount = 0;
              ?>
              <div class="row batchOrderField" @if($wallet_amount>0) style="display:block" @else style="display:none" @endif>
                <div class='col-md-6 col-sm-6 col-xs-6'>Hobbyix Wallet</div>
                <div class='col-md-6 col-sm-6 col-xs-6'>: Rs. {{$wallet_amount}}/-</div>
              </div>    
              <div class="row batchOrderField">
                <div class='col-xs-9' id="promoCodeContainer">
                  <input type="text" style="width:100%" placeholder="Enter Promo Code (Optional)" class="form-control" id="promoCode" name="promo_code" />                     
                </div>
                <div class='col-xs-3' style="text-align:left;padding:1px 0px 1px 0px;font-size:15px;">
                   <a href="javascript:verifyPromoCode();">Apply</a>
                </div>          
              </div>       
              <hr/>
              <div class="row totalAmount">               
                <div class="">Amount Payable<span id="orderTotal">: Rs. {{$amountPayable}}/-</span></div>
                <input type="hidden" id="payment" name="payment" value="{{$amountPayable}}">
                <input type="hidden" name="wallet_amount" value="{{$wallet_amount}}">
                <input type="hidden" name="referral_credit_used" value="{{$batchDetails->batch_credit}}">
              </div>
              <div class="row batchOrderButtons">    
                <button style="padding:5px 70px;" class="booknowButton" id="proceedButton">Proceed</button>               
              </div>
            </div>
            <div class="" id="bookOrderFormStep2">
              <div class="row batchOrderField">
                <div class='col-md-5 col-sm-4 col-xs-5'>Name*</div>
                <div class='col-md-7 col-sm-8 col-xs-7'>
                  <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                  <input type="text" placeholder="Enter Name" class="form-control" id="name" name="name" value="@if(isset($user)){{$user->user_name}}@endif" required/>
                </div>          
              </div>   
              <div class="row batchOrderField">
                <div class='col-md-5 col-sm-4 col-xs-5'>E-Mail ID*</div>
                <div class='col-md-7 col-sm-8 col-xs-7'>
                      <input type="email" placeholder="Enter E-Mail ID" class="form-control" id="email" name="email" value="@if(isset($user)){{$user->email}}@endif" required />                     
                </div>          
              </div>   
              <div class="row batchOrderField">
                <div class='col-md-5 col-sm-4 col-xs-5'>Mobile Number*</div>
                <div class='col-md-7 col-sm-8 col-xs-7'>
                      <input type="tel" placeholder="Enter Mobile Number" class="form-control" id="contact_no" name="contact_no" value="@if(isset($user)){{$user->user_contact_no}}@endif" required />                     
                </div>          
              </div> 
               <hr/>   
              <div class="row batchOrderButtons">  
                <button style="padding:5px 50px;background:lightgrey;color:black" class="booknowButton" id="goBackButton" >Go Back</button>
                <button type="submit" style="padding:5px 50px;" class="booknowButton" id="booknowButton" name="pay_cc" value="payment">Pay Now</button>
                <button type="submit" style="padding:5px 58px;background:#36BF6C" class="booknowButton" id="payCredits" name="pay_hobbyix" value="credit">Pay Using Hobbyix Membership</button>
              </div>              
            </div>
          </form>          
        </div>
        @if($instituteDetails!=null)
        <div class="sample-box-small" id='institute-details'>
           <div id='sample-batch-name'>Institute Details</div>
           <span id='sample-details' class="details-container">{{$instituteDetails}}</span>    
        </div>
        @endif       
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
            if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }                 
          ?>
           @for(;$index<$maxlength; $index++ )
            <ul class="col-md-3 col-sm-3 col-xs-6">           
              <li title="{{$batchesOfInstitute[$index]->subcategory}}, {{$batchesOfInstitute[$index]->institute}}, {{$batchesOfInstitute[$index]->locality}} - {{$batchesOfInstitute[$index]->location}}">
                <a class="text_over_flow_hide" href="/batches/show/{{$batchesOfInstitute[$index]->id}}">
                  {{$batchesOfInstitute[$index]->subcategory}}, {{$batchesOfInstitute[$index]->institute}}
                </a>
              </li>
            </ul>          
          @endfor           
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 related_item">
          <h4>Other {{$subcategory}} classes</h4>
          <?php
            $institutesLength = sizeof($institutesOfSubcategoryInLocality);
            $index = 0;
            $maxlength = 12;          
            if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }                  
          ?>
          @for(;$index<$maxlength; $index++ )
            <ul class="col-md-3 col-sm-3 col-xs-6">            
              <li title="{{$institutesOfSubcategoryInLocality[$index]->institute}}">
                <a class="text_over_flow_hide" href="/filter/institute/{{$institutesOfSubcategoryInLocality[$index]->id}}">
                  {{$institutesOfSubcategoryInLocality[$index]->institute}}
                </a>
              </li>
            </ul>        
          @endfor   
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 related_item">
          <h4>{{$category}} classes in {{$locality}}</h4>
          <?php
            $institutesLength = sizeof($subcategoriesInLocality);
            $index = 0;
            $maxlength = 12;          
            if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }                  
          ?>
          @for(; $index<$maxlength; $index++ )
            <ul class="col-md-3 col-sm-3 col-xs-6">            
                <li title="{{$subcategoriesInLocality[$index]->subcategory}} classes in {{$locality}}">
                  <a class="text_over_flow_hide" href="/filter/{{$subcategoriesInLocality[$index]->id}}/{{$locality_id}}">
                    {{$subcategoriesInLocality[$index]->subcategory}} classes in {{$locality}}
                  </a> 
                </li>
            </ul>
          @endfor   
        </div>
    </div>
  </div>
@stop
@section('pagejquery')
  <script src="/assets/js/jquery-ui-1.10.4.min.js"></script>
  <script type="text/javascript"> 
    var dateToday = new Date();
    var walletAmount = {{json_encode( $wallet_amount ) }};            
    var weekDaysAvailable = {{json_encode( $weekDaysAvailable ) }};  
    var formValidationStatus = false;
    var oldPromoCode = "";          
    function verifyPromoCode (condition) 
    { 
      formValidationStatus = false;               
      $('#promoCodeContainer #statusMessage').empty();
      var promoCode = $("#promoCode").val();
      var conditionMessage = "";          
      if(condition == "onDirectApply")
        conditionMessage = ". Click on Proceed";
      if(promoCode != "" )
      {
        oldPromoCode = promoCode;           
        $.get("/promos/isvalid/"+promoCode,function(response)
        { 
          if($.isNumeric(response))
          {
            $('#orderTotal').empty();  
            $('#orderTotal').append(": Rs. "+response+"/-");
            $('#payment').val(response);            
            $('#promoCodeContainer').append("<span id='statusMessage' style='color:green'>Promo Code Applied"+conditionMessage+"</span>");
            formValidationStatus = true;            
          }
          else
          {            
            var sessionsCount = $("#numberOfSessions").val();             
            var sessionPrice = {{$sessionPrice}};
            var subtotal = sessionPrice*sessionsCount; 
            if(walletAmount>0)
            {
              if(walletAmount>=subtotal)        
                subtotal = 0;
              else
                subtotal = subtotal - walletAmount;
            }           
            $('#orderTotal').empty();  
            $('#orderTotal').append(": Rs. "+subtotal+"/-");
            $('#payment').val(subtotal);      
            $('#promoCodeContainer').append("<span id='statusMessage'>"+response+"</span>");
          }
        });                   
      }       
      else if (condition != "onDirectApply" )     
        $('#promoCodeContainer').append("<span id='statusMessage'>Please Enter Promo Code</span>");                                 
      return formValidationStatus;      
    }     
    function DisableDay(date) 
    {
        var day = date.getDay();        
        if (weekDaysAvailable[day] == 0) { return [false]; } 
        else { return [true]; }      
    } 
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
        $('#payCredits').click(function(e)
        {
          if(categoryId=="")
          {
            e.preventDefault();
            e.stopPropagation();
            $('#loginModal').modal('show') ;
          }
        });
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
            if(walletAmount>0)
            {
              if(walletAmount>=subtotal)        
                subtotal = 0;
              else
                subtotal = subtotal - walletAmount;
            }
            $('#orderTotal').empty();  
            $('#orderTotal').append(": Rs. "+subtotal+"/-");
            $('#payment').val(subtotal);
        });
        $('#SubmitReviewButton').bind('click', function(event) 
        {
          var height = $("#ReviewForm").position().top + 200;
          $('html, body').stop().animate({
           scrollTop : height
          }, 1000, 'easeInOutSine');
          event.preventDefault();
        });
        $("#booking_date").datepicker({          
          changeMonth: true,
          numberOfMonths: 1,
          minDate: dateToday,                
          beforeShowDay: DisableDay,
          dateFormat: 'yy-mm-dd'         
        });    
        $('#proceedButton').click(function(e)
        {  
          e.preventDefault();       
          e.stopPropagation();
          var promoCode = $("#promoCode").val();
          var promoCodeStatus = true;        
          if(promoCode != "")
          {       
            if(oldPromoCode != promoCode || formValidationStatus==false)                      
              verifyPromoCode('onDirectApply');                    
            oldPromoCode = promoCode;        
          }
          if(bookOrderFormValidate() && formValidationStatus)
          {              
            $("#bookOrderFormStep1").hide();
            $("#bookOrderFormStep2").fadeIn();              
          }          
        }); 
        $('#goBackButton').click(function(e)
        {          
          e.preventDefault();       
          e.stopPropagation();         
          $("#bookOrderFormStep1").fadeIn();
          $("#bookOrderFormStep2").hide();                        
        }); 
        $('#batchOrderForm').bootstrapValidator({                    
          fields: {

          name: {
          validators: {
              notEmpty: {
                  message: 'Name is required'
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
          },
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
          }
          }
        });   

    });
  </script>
@stop