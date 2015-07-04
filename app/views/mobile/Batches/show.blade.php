@extends('Layouts.layout')
@section('pagestylesheet')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style type="text/css">

  .overflow_x {max-width:100%;overflow-x:hidden}

  #page { width: 100%;margin-top: 0px;padding: 4em 0 1.2em;
          background-repeat:no-repeat;
        background-position:center center;
        -o-background-size: cover,auto;
        -moz-background-size:cover, auto;
        -webkit-background-size:cover, auto;
        background-size: cover, auto;}

  .samplePageInfo {  background: rgba(0, 0, 0, 0.9); color: white; padding: 0px 0px 10px 0px;}

  .sample-institute-name  { font-size: 22px;font-weight: bold;  }  

  .sample_batch_detail  { font-size: 15px;font-weight: normal;margin-bottom: 5px; }

  .sample_batch_detail .lan_con {margin: 5px 0 0 0; font-size: 15px;padding: 0}

  .lan_con button {padding: 1px 6px;border-radius: 0px }

  .sample_batch_detail .glyphicon { font-size: 15px;font-weight: normal; }

  .blog-container { background:#f0f3f6;width: 100%;}

  .sample-box { background: white;margin: 20px 0px 0px 0px;box-shadow: 2px 2px 2px -2px rgba(0,0,0,0.5);padding: 5px 9px;
    -moz-box-shadow: 2px 2px 2px -2px rgba(0,0,0,0.5);-webkit-box-shadow: 2px 2px 2px -2px rgba(0,0,0,0.5);
  }

  .sample_box_title { font-size: 17px;border-bottom:1px solid skyblue;text-align: center;padding: 7px 5px 2px 5px;font-weight:bold; }

  .sample_box_data { padding: 7px 5px 5px 5px;font-size: 15px;}

  .rating { overflow: hidden; display: inline-block; }

  .rating-input { float:right; width:5px; height:5px; padding:0px; margin: 0 0 0 -16px; opacity: 0; }

  .rating-star { position:relative; float:right; display:block; width:16px; height:16px; background:url(/assets/images/sample/star.png) 0 -16px; }

  .rating-star:hover, .rating-star:hover ~ .rating-star, .rating-input:checked ~ .rating-star { background-position: 0 0; }

  #ReviewForm {margin-top: -15px;}

  #comments button { height: 25px; padding: 0px 7px;text-align: center;border-radius: 3px;}

  .submitReviewButton {margin-top: 0px;}

  .review_submit_button, .submitReviewButton{text-align: center;}

  .batchOrderField {margin-bottom: 7px;}

  .sample_box_order_data { padding: 9px 5px 0px 5px;font-size: 14px;}

  #batchOrderSample select { height: 25px; padding: 0px 0px 0px 5px; width: 90%; border-radius: 2px; }

  #batchOrderSample input { height: 25px; padding: 0px 0px 0px 5px; width: 90%; border-radius: 2px; }

  .batchOrderFieldLabel { margin-top: 3px;text-align: left;}

  .totalAmount {margin-top: 0px;text-align: center;padding-right: 0px;}

  .batchOrderField button { border:0px;background-color: #3aa54c;font-size: 15px;color: white;height:30px;padding: 4px;margin-top: 5px; }

  .sample_box_order_data .have_promo_code { padding: 5px 30px;margin-top: 10px;}

  .sample_box_order_data label {margin-top: 6px;}

  .promo_form_field {clear: both;margin-top: 0px;}
  
  .sample-box img {  width: 35px; height: 35px; margin-right: 5px;  }

  #related_data_container {  border-top: 1px solid lightgrey;padding: 20px 5%;width: 100%;  }

  #related_data_container h4 {font-size: 18px;color: #444;font-weight: bold;margin:0px 0px 5px 0px;}
  
  .booknowButton, .booknowButton:hover, .booknowButton button:active { background: #3396d1;margin-top: 5px;padding: 5px 25px 5px 25px;border-radius: 0px;border:0px solid;text-align: center; }

  .batchOrderButtons { text-align: center;color: white}

  .related_item {margin-bottom: 15px;}

  .related_item a {color:#5C5C5C;}

  .help-block {color: #a94442 !important}

  #bookOrderFormStep1{padding-bottom: 10px;}

  #bookOrderFormStep2 { display: none;padding: 5px 0 10px 0;  }

  hr {margin: 10px 0px 10px 0px; }

  .facilities_icon {margin-right: 1px;}

  #batch-facilities {text-align: center;margin-top: 20px;}

  .batch-details {  margin-top: 10px;  }

  .batch-details .glyphicon  {  color: #0099FF;margin: 10px 5px 0px 0px; }

  #promoCodeContainer #statusMessage {color: #e24648;font-size: 14px;}

  #favClassAlertMessage {display: none;position:absolute;width:100%;border-radius:0;}

  #favClassAlertMessage #responseMessage{padding: 0;font-size: 14px;}

</style> 

@stop
@section('content')
<script src="/assets/js/jquery-ui-1.10.4.min.js"></script>
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
    $difficultyLevel = $batchDetails->batch_difficulty_level;
    $sessionsCount = $batchDetails->batch_no_of_classes_in_week;
    $comment = $batchDetails->batch_comment;
    $tagline = $batchDetails->batch_tagline;
    $batchAccomplishment = $batchDetails->batch_accomplishment;
    $instituteDetails = $batchDetails->institute_description;
    $facebookLink = $batchDetails->institute_fblink;
    $twitterLink = $batchDetails->institute_twitter;
    $locality_id = $batchDetails->venue_locality_id; 
    $locality =  $batchDetails->locality;    
    $landMark = $batchDetails->venue_landmark;
    $location = $batchDetails->location;
    $pincode =  $batchDetails->venue_pincode;
    $facilitiesName = ["Air Conditioning","Cafe","Changing Room","Locker","Shower Room","Steam"];
    $facilities = ["air_conditioning","cafe","locker","locker","shower_room","steam"];
    $facilitesAvailable = [];
    for ($i=0; $i < 6 ; $i++) { 
      $facilitesAvailable[$i] = $batchDetails->$facilities[$i];      
    }
    $weekDays = ["sunday","monday","tuesday","wednesday","thursday","friday","saturday"];
    $weekDaysAvailable = [];
    for ($i=0; $i < 7 ; $i++) 
    { 
      $weekDaysAvailable[$i] = $batchDetails->$weekDays[$i];   
    }    
?>
<div id="favClassAlertMessage" class="alert alert-success alert-dismissable" style="display:none">         
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
    X
  </button>    
  <div id="responseMessage"></div>
</div>
<div id="page" class="hfeed site overflow_x" style="background-image: url(/assets/images/sample/workout.jpg);">
  <div id="content" class="site-content">
    <div class="samplePageInfo cover-wrapper">
      <div class="container">
        <div class="sample_batch_detail">
          <div class='sample-institute-name'>{{$instituteName}}</div>
          <div>{{'  '.$subcategory}},{{' '.$category}}</div>
          <div class="row lan_con">
            <div class="text_over_flow_hide">
              <i class='glyphicon glyphicon-map-marker'></i>
              {{'  '.$landMark.', '.$instituteAddress}}
            </div>
          </div>
          <div class="row lan_con" style="margin-top:0px">
            <div class="col-xs-7 maz_pad_z" >
              <i class='glyphicon glyphicon-phone-alt'></i>&nbsp;
              <a style="color:white" href="tel:{{$instituteContact}}">{{$instituteContact}}</a>
            </div>
            <div class="col-xs-5 maz_pad_z">
              @if(isset($user))<button id="favButton" onclick="markFavClass({{$batchDetails->id}});" @if($batchDetails->id!=$user->user_favorite) class="btn btn-primary" @else class="btn btn-success"@endif>Mark as Favorite</button>@endif
            </div>
          </div>                    
        </div>        
      </div>
    </div>
  </div>
</div>
<div class="overflow_x" id='batchOrderSample' style="padding-top:0px;padding-bottom:5px;margin-top:0px;">        
  <div class='sample_box_title' style="padding:10px 0px 2px 0px;margin-top:0px;">Book This Class</div>
  <div class="sample_box_order_data" style="padding:10px 15px 0px 15px;">        
    <form role="form" method="post" name="batchOrderForm"  enctype="multipart/form-data" id="batchOrderForm" action="/bookings" > 
      <div class="" id="bookOrderFormStep1">
        <input type="hidden" name="batch_id" value="{{$batchID}}">
        <div class="row batchOrderField">
          <div class='col-xs-6'>Price Per Session</div>
          <div class='col-xs-6'>: Rs. {{$sessionPrice}} or {{$batchDetails->batch_credit}} Credits</div>
        </div>       
        <div class="row batchOrderField">
          <div class='col-xs-6 batchOrderFieldLabel'>No. of Sessions*</div>
          <div class='col-xs-6'>  
              <select class="form-control" id="numberOfSessions" name="no_of_sessions" >                 
                  @for($session=1;$session<=6;$session++)
                      <option value={{$session}}>{{$session}}</option>
                  @endfor
              </select>
          </div>
        </div>
        <div class="row batchOrderField">
          <div class='col-xs-6 batchOrderFieldLabel'>Booking Date*</div>
          <div class='col-xs-6'>
              <input type="text" readonly="true" style="background:white"placeholder="Select Date" class="form-control" id="booking_date" name="booking_date" />
          </div>          
        </div>
        <div class="row batchOrderField" @if($credentials['wallet_amount']>0) style="display:block" @else style="display:none" @endif>
          <div class='col-xs-6'>Hobbyix Wallet</div>
          <div class='col-xs-6'>: Rs. {{$credentials['wallet_amount']}}/-</div>
        </div> 
        <div class="row batchOrderField" @if($credentials['wallet_amount']>0) style="display:block" @else style="display:none" @endif>
          <div class='col-sm-6 col-xs-6'>Wallet Balance</div>
          <div class='col-sm-6 col-xs-6'><span id="walletBalance">: Rs. {{$credentials['wallet_balance']}}/-</span></div>
        </div>  
        <div class="row batchOrderField">
          <div class='col-xs-9 batchOrderFieldLabel' id="promoCodeContainer">
            <input type="text" style="width:100%" placeholder="Enter Promo Code" class="form-control" id="promoCode" name="promo_code" />                     
          </div>
          <div class='col-xs-3' style="text-align:left;padding:5px 0px 0px 0px;font-size:15px;">
             <a href="javascript:verifyPromoCode();">Apply</a>
          </div>          
        </div>            
        <hr/>
        <div class="row totalAmount">         
          <div class="">Amount Payable<span id="orderTotal">: Rs. {{$credentials['payment']}}/-</span></div>
          <input type="hidden" name="credit_used" value="{{$batchDetails->batch_credit}}">
          <input type="hidden" name="wallet_amount" value="{{$credentials['wallet_amount']}}">
          <input type="hidden" id="payment" name="payment" value="{{$credentials['payment']}}">
        </div>
        <div class="row batchOrderButtons" style="margin-top:5px;">    
          <button style="padding:5px 50px;" class="booknowButton" id="proceedButton">Proceed</button>
          <!-- <a href=""><div class="col-md-7 col-sm-12 col-xs-12 payNowButton payNowButton1">Hobbyix Passport</div></a> -->
        </div>        
      </div>
      <div class="" id="bookOrderFormStep2" >
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
          <button onclick="goBackToOrder();" style="padding:5px 50px;background:lightgrey;color:black" class="booknowButton" id="goBackButton" >Go Back</button>
          <button type="submit" style="padding:5px 50px;" class="booknowButton" id="booknowButton" name="pay_cc" value="payment" >Pay Now</button>
          <button type="submit" style="padding:5px 58px;background:#36BF6C" class="booknowButton" id="payCredits" name="pay_hobbyix" value="credit">Pay Using Hobbyix Membership</button>
        </div>              
      </div>
    </form>
  </div>        
</div> 
<div class="container blog-container" style="margin:0;padding:0">
  <div class="row" style="width:100%;margin:0">    
    <div class="col-xs-12">            
        <div id="sample-batch-details" class="sample-box " >
          <div class='sample_box_title'><span class="text_over_flow_hide">{{$instituteName}} Details</span></div>
          <div class="sample_box_data">
            <div id='batch-session-count' class="batch-details"><span class='glyphicon glyphicon-home' id='pin-icon'></span>
              {{$instituteAddress.', '.$locality.', '.$location.', '.$pincode}}
            </div>
            <div @if(!isset($landMark)) style="display:none" @endif id='batch-session-count' class="batch-details"><span class='glyphicon glyphicon-map-marker' id='pin-icon'></span>
              Land Mark: {{$landMark}}
            </div>
            <div id='batch-openclass' class="batch-details"><span class='glyphicon glyphicon-phone-alt' id='pin-icon'></span>
              +91 {{$instituteContact}}
            </div>
            <div id='batch-openclass' class="batch-details"><span class='glyphicon glyphicon-time' id='pin-icon'></span>
              {{$comment.' '.$tagline}}
            </div>
            <div id='batch-facilities' class="batch-details">
              @for($i=0;$i<=5;$i++)            
                  <span class="facilities_icon" @if($facilitesAvailable[$i]==0) style="opacity:.2" @endif>
                    <img src="/assets/images/Facilities/{{$facilitiesName[$i]}}.png" width="30px" height="30px" title="{{$facilitiesName[$i]}}" alt="{{$facilitiesName[$i]}}">
                  </span>           
              @endfor
            </div> 
          </div>   
        </div>
        @if($instituteDetails!=null)
          <div class="sample-box " id='institute-details'>
            <div class='sample_box_title'>Institute Details</div>
            <div class="sample_box_data">
              <span id='sample-details' class="details-container">{{$instituteDetails}}</span>    
            </div>
          </div>
        @endif
        <div id="comments" class="sample-box ">
          <div class='sample_box_title'>Write a Review</div>
          <div class="sample_box_data">          
            <form  action='/comments/store/' method='post' id="commentsForm" enctype="multipart/form-data" method="post" id="commentform" class="comment-form details-container" novalidate="">            
              <div class="form-group reviewInstituteName" id='rating-input'>
                  <div class="ratingInput">
                    <input id="comment_rating" name="comment_rating" class="rating" data-min="0" data-max="5" data-step="1" data-show-clear="false"  data-size="xs" >
                  </div>                                                       
              </div>  
              <div class="form-group" id="ReviewForm">
                <label for="comment">Review:</label>
                <textarea class="form-control" rows="2" name='comment' id="comment" required='required'></textarea>
              </div>
              <div class="review_submit_button">
                @if($loggedIn)
                  <button type="submit" class="btn btn-primary">Submit</button>              
                @else
                  <button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-primary">Submit a Review</button>           
                @endif
              </div>
            </form>
          </div>
        </div>            
      
    </div>  
  </div>
  <div class="space_footer"></div>
</div>
@stop
@section('pagejquery')
<script type="text/javascript">
  var dateToday = new Date();
  var walletAmount = {{json_encode( $credentials['wallet_amount'] ) }};
  var weekDaysAvailable = {{json_encode( $weekDaysAvailable ) }}; 
  var formValidationStatus = false;
  var oldPromoCode = ""; 
  function markFavClass(batchID)
  {       
    $.get("/users/favorite/"+batchID,function(response)
    {
      $("#favClassAlertMessage").hide();
      $("#favClassAlertMessage").fadeIn(300);        
      $('html, body').animate({
        scrollTop: $("#favClassAlertMessage").offset().top - 150
      }, 300);
      $("#responseMessage").empty();
      $("#responseMessage").append(response);
        $("#favButton").removeClass("btn-primary");
        $("#favButton").addClass("btn-success");
    }); 
  }                  
  function verifyPromoCode (condition) 
  { 
    formValidationStatus = false;               
    $('#promoCodeContainer #statusMessage').empty();
    var promoCode = $("#promoCode").val();
    var conditionMessage = "";
    var sessionsCount = $("#numberOfSessions").val();                       
    if(condition == "onDirectApply")
      conditionMessage = ". Click on Proceed";
    if(promoCode != "" )
    {
      oldPromoCode = promoCode;           
      $.get("/promos/isvalid/"+promoCode+"/"+sessionsCount,function(response)
      { 
        if($.isNumeric(response['price']))
        {
          $('#orderTotal').empty();  
          $('#orderTotal').append(": Rs. "+response['price']+"/-");
          $('#payment').val(response['price']);  
          $('#walletBalance').empty();  
          $('#walletBalance').append(": Rs. "+response['wallet_balance']+"/-");
          $('#promoCodeContainer').append("<span id='statusMessage' style='color:green'>Promo Code Applied"+conditionMessage+"</span>");
          formValidationStatus = true;            
        }
        else
        {                          
          $('#promoCodeContainer').append("<span id='statusMessage'>"+response+"</span>");
        }
      });                   
    }       
    else if (condition != "onDirectApply" ) 
    {   
      $('#promoCodeContainer').append("<span id='statusMessage'>Please Enter Promo Code</span>");                            
    }
    if(!formValidationStatus)
    {        
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
    }
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
        .text("required field")
        .appendTo(errorMessageContainer);      
    }
    return Result;
  }
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
          window.location.href="/users/login";
        }
      });
      $('#payCredits').click(function(e)
      {
        if(categoryId=="")
        {
          e.preventDefault();
          e.stopPropagation();
            window.location.href="/users/login";
        }
      });
      $('#numberOfSessions').change(function () 
      {
          var sessionsCount = $(this).val();             
          var sessionPrice = {{$batchDetails->batch_single_price}};
          var subtotal = sessionPrice*sessionsCount;
          var walletBalance=0;
          if(walletAmount>0)
          {
            if(walletAmount>=subtotal)        
            {
              walletBalance = walletAmount-subtotal;
              subtotal = 0;
            }
            else
            {
              walletBalance = 0;
              subtotal = subtotal - walletAmount;
            }  
            $('#walletBalance').empty();  
            $('#walletBalance').append(": Rs. "+walletBalance+"/-");
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
          if(bookOrderFormValidate() && formValidationStatus)
          {              
            $("#bookOrderFormStep1").hide();
            $("#bookOrderFormStep2").fadeIn();              
          }       
        }
        else if(oldPromoCode != promoCode)
        {
          verifyPromoCode();
          oldPromoCode = promoCode;        
        }
        else if(bookOrderFormValidate())
        {
          $("#bookOrderFormStep1").hide();
          $("#bookOrderFormStep2").fadeIn(); 
        }           
      }); 
      $('#goBackButton').click(function(e)
      {          
        e.preventDefault();       
        e.stopPropagation();         
        if(bookOrderFormValidate())
        {   
          $("#bookOrderFormStep1").fadeIn();
          $("#bookOrderFormStep2").hide();              
        }      
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
      $("#booking_date").datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
          minDate: dateToday,
          beforeShowDay: DisableDay,
          dateFormat: 'yy-mm-dd'         
      });  
      $('#promoCode').keypress(function(e){
        if ( e.which == 13 )
        {
          verifyPromoCode () ;
          e.preventDefault();
        } 
      });  
  });
</script>
@stop