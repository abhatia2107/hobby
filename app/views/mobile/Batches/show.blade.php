@extends('Layouts.layout')
@section('pagestylesheet')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style type="text/css">

  #page { width: 100%;margin-top: 0px;padding: 4em 0 2em;
          background-repeat:no-repeat;
        background-position:center top;
        -o-background-size: 130% 120%, auto;
        -moz-background-size: 130% 120%, auto;
        -webkit-background-size: 130% 120%, auto;
        background-size: 130% 150%, auto;}

  .samplePageInfo {  background: rgba(0, 0, 0, 0.4); color: white; padding: 0px 0px 10px 0px;}

  .sample-institute-name  { font-size: 22px;font-weight: bold;  }  

  .sample_batch_detail  { font-size: 15px;font-weight: normal;margin-bottom: 5px; }

  .sample_batch_detail li {margin-top: 5px; font-size: 15px;}

  .sample_batch_detail .glyphicon { font-size: 15px;font-weight: normal; }

  .blog-container { background:#f0f3f6;width: 100%;}

  .sample-box { background: white;margin-top: 20px;box-shadow: 2px 2px 2px -2px rgba(0,0,0,0.5);padding: 5px 9px;
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
    $trialClass = $batchDetails->batch_trial;
    $sessionsCount = $batchDetails->batch_no_of_classes_in_week;
    $batchDescription = $batchDetails->batch_comment;
    $batchAccomplishment = $batchDetails->batch_accomplishment;
    $instituteDetails = $batchDetails->institute_description;
    $facebookLink = $batchDetails->institute_fblink;
    $twitterLink = $batchDetails->institute_twitter;
    $locality_id = $batchDetails->venue_locality_id; 
    $locality =  $batchDetails->locality;    
?>
<div id="page" class="hfeed site" style="background-image: url(/assets/images/sample/Stocksy_txp782c31421CE000_Medium_85879.jpg);">
  <div id="content" class="site-content">
    <div class="samplePageInfo cover-wrapper">
      <div class="container">
        <div class="sample_batch_detail">
          <div class='sample-institute-name'>{{$instituteName}}</div>
          <div>{{'  '.$subcategory}},{{' '.$category}}</div>
          <li><div class='glyphicon glyphicon-map-marker'></div>{{'  '.$instituteAddress}}</li>
          <li><div class='glyphicon glyphicon-phone-alt'></div>{{'  '.$instituteContact}}</li>
        </div>        
      </div>
    </div>
  </div>
</div>
<div class="" id='batchOrderSample' style="padding-top:0px;margin-top:0px;">        
  <div class='sample_box_title' style="padding:10px 0px 2px 0px;margin-top:0px;">Book This Class</div>
  <div class="sample_box_order_data" style="padding:10px 15px 0px 15px;">        
    <form role="form" method="post" name="batchOrderForm" id="batchOrderForm" action="/bookings" > 
      <div class="" id="bookOrderFormStep1">
        <input type="hidden" name="batch_id" value="{{$batchID}}">
        <div class="row batchOrderField">
          <div class='col-xs-6'>Price Per Session</div>
          <div class='col-xs-6'>: Rs. {{$sessionPrice}}</div>
        </div>
        <div class="row batchOrderField">
          <div class='col-xs-6 batchOrderFieldLabel'>No. of Sessions*</div>
          <div class='col-xs-6'>  
              <select class="form-control" id="numberOfSessions" name="no_of_sessions" >                 
                  @for($seesion=1;$seesion<=6;$seesion++)
                      <option value={{$seesion}}>{{$seesion}}</option>
                  @endfor
              </select>
          </div>
        </div>
        <div class="row batchOrderField">
          <div class='col-xs-6 batchOrderFieldLabel'>Booking Date*</div>
          <div class='col-xs-6'>
              <input type="text" placeholder="Select Date" class="form-control" id="booking_date" name="booking_date" />
          </div>          
        </div>
        <div class="row batchOrderField">
          <div class='col-xs-9 batchOrderFieldLabel'>
            <input type="text" style="width:100%" placeholder="Enter Promo Code" class="form-control" id="promoCode" name="Promo Code" />                     
          </div>
          <div class='col-xs-3' style="text-align:left;padding:5px 0px 0px 0px;font-size:15px;">
             <a href="javascript:verifyPromoCode();">Apply</a>
          </div>          
        </div>            
        <hr/>
        <div class="row totalAmount">
          <div class="">Amount Payable<span id="orderTotal">: Rs. {{$sessionPrice}}</span></div>
          <input type="hidden" id="payment" name="payment" value="{{$sessionPrice}}">
        </div>
        <div class="batchOrderButtons">    
          <button style="padding:5px 50px;" class="booknowButton" id="proceedButton">Proceed</button>
          <!-- <a href=""><div class="col-md-7 col-sm-12 col-xs-12 payNowButton payNowButton1">Hobbyix Passport</div></a> -->
        </div>
      </div>
      <div class="" id="bookOrderFormStep2">
        <div class="row batchOrderField">
          <div class='col-md-5 col-sm-4 col-xs-5'>Name*</div>
          <div class='col-md-7 col-sm-8 col-xs-7'>
                <input type="text" placeholder="Enter Name" class="form-control" id="name" name="name" value="@if(isset($user)){{$user->user_first_name.$user->user_last_name}}@endif" required/>
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
          <button type="submit" style="padding:5px 70px;" class="booknowButton" id="booknowButton" >Pay Now</button>
          <!-- <a href=""><div class="col-md-7 col-sm-12 col-xs-12 payNowButton payNowButton1">Hobbyix Passport</div></a> -->
        </div>
      </div>
    </form>
  </div>        
</div> 
<div class="container blog-container" style="margin:0;padding:0">
  <div class="row clearfix">    
    <div class="col-xs-12">
      <div class="col-xs-12">
        <div class="sample-box" id='batchOrderSample' style="display:none">        
          <div class='sample_box_title' style="padding-top:3px">Book This Class</div>
          <div class="sample_box_order_data">        
            <form role="form" method="post" name="batchOrderForm" id="batchOrderForm" action="/bookings" > 
              <div class="" id="bookOrderFormStep1">
                <input type="hidden" name="batch_id" value="{{$batchID}}">
                <div class="row batchOrderField">
                  <div class='col-xs-6'>Price Per Session</div>
                  <div class='col-xs-6'>: Rs. {{$sessionPrice}}</div>
                </div>
                <div class="row batchOrderField">
                  <div class='col-xs-6 batchOrderFieldLabel'>No. of Sessions*</div>
                  <div class='col-xs-6'>  
                      <select class="form-control" id="numberOfSessions" name="no_of_sessions" >                 
                          @for($seesion=1;$seesion<=6;$seesion++)
                              <option value={{$seesion}}>{{$seesion}}</option>
                          @endfor
                      </select>
                  </div>
                </div>
                <div class="row batchOrderField">
                  <div class='col-xs-6 batchOrderFieldLabel'>Booking Date*</div>
                  <div class='col-xs-6'>
                      <input type="text" placeholder="Select Date" class="form-control" id="booking_date" name="booking_date" />
                  </div>          
                </div>
                <div class="row batchOrderField">
                  <div class='col-xs-9 batchOrderFieldLabel'>
                    <input type="text" style="width:100%" placeholder="Enter Promo Code" class="form-control" id="promoCode" name="Promo Code" />                     
                  </div>
                  <div class='col-xs-3' style="text-align:left;padding:5px 0px 0px 0px;font-size:15px;">
                     <a href="javascript:verifyPromoCode();">Apply</a>
                  </div>          
                </div>            
                <hr/>
                <div class="row totalAmount">
                  <div class="">Amount Payable<span id="orderTotal">: Rs. {{$sessionPrice}}</span></div>
                  <input type="hidden" id="payment" name="payment" value="{{$sessionPrice}}">
                </div>
                <div class="batchOrderButtons">    
                  <button style="padding:5px 50px;" class="booknowButton" id="proceedButton">Proceed</button>
                  <!-- <a href=""><div class="col-md-7 col-sm-12 col-xs-12 payNowButton payNowButton1">Hobbyix Passport</div></a> -->
                </div>
              </div>
              <div class="" id="bookOrderFormStep2">
                <div class="row batchOrderField">
                  <div class='col-md-5 col-sm-4 col-xs-5'>Name*</div>
                  <div class='col-md-7 col-sm-8 col-xs-7'>
                        <input type="text" placeholder="Enter Name" class="form-control" id="name" name="name" required />
                  </div>          
                </div>
                <div class="row batchOrderField">
                  <div class='col-md-5 col-sm-4 col-xs-5'>E-Mail ID*</div>
                  <div class='col-md-7 col-sm-8 col-xs-7'>
                        <input type="email" placeholder="Enter E-Mail ID" class="form-control" id="email" name="email" required />                     
                  </div>          
                </div>   
                <div class="row batchOrderField">
                  <div class='col-md-5 col-sm-4 col-xs-5'>Mobile No.*</div>
                  <div class='col-md-7 col-sm-8 col-xs-7'>
                        <input type="tel" placeholder="Enter Mobile No." class="form-control" id="contact_no" name="contact_no" required />                     
                  </div>          
                </div> 
                 <hr/>   
                <div class="row batchOrderButtons">    
                  <button type="submit" style="padding:5px 50px;" class="booknowButton" id="booknowButton" >Pay Now</button>
                  <!-- <a href=""><div class="col-md-7 col-sm-12 col-xs-12 payNowButton payNowButton1">Hobbyix Passport</div></a> -->
                </div>              
              </div>
            </form>
          </div>        
        </div>     
        <div id="sample-batch-details" class="sample-box" >
          <div class='sample_box_title'>Batch Details</div>
          <div class="sample_box_data">
            <div id='batch-session-count' class="batch-details">
              <i class='glyphicon glyphicon-pushpin' id='pin-icon'></i>
              Sessions per Week: {{$sessionsCount}}
            </div>    
          </div>   
        </div>
        <div class="sample-box" id='institute-details'>
          <div class='sample_box_title'>Institute Details</div>
          <div class="sample_box_data">
            <span id='sample-details' class="details-container">{{$instituteDetails}}</span>    
          </div>
        </div>
        <div id="comments" class="sample-box">
          <div class='sample_box_title'>Write a Review</div>
          <div class="sample_box_data">          
            <form  action='/comments/store/' method='post' id="commentsForm" enctype="multipart/form-data" method="post" id="commentform" class="comment-form details-container" novalidate="">            
              <div class="form-group" id='rating-input'>
                  <label for="rating" style="float:left;margin-right:12px;">Rate this Batch:</label>
                  <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="comment_institute_id" value="{{$instituteID}}">
                  <span class="rating">
                  @for($index = 5; $index > 0;$index--)
                    <input type="radio" class="rating-input" required='required'
                        id="rating-input-1-{{$index}}" value="{{$index}}" name="comment_rating">
                    <label for="rating-input-1-{{$index}}" class="rating-star"></label>
                  @endfor                 
                </span>                                                            
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
        <div class="sample-box" style="display:none">
          <div class='sample_box_title'>Social Profiles</div>
          <div class="sample_box_data">         
            <a href="{{$twitterLink}}" class="sample-social-twitter"><img src="/assets/images/sample/twitter.jpg"></a>
            <a href="{{$facebookLink}}" class="sample-social-facebook"><img src="/assets/images/sample/facebook.jpg"></a>
            <!-- <a href="https://plus.google.com/" class="sample-social-googleplus"><img height="42px" src="/assets/images/sample/googleplus.jpg"></a>
            <a href="http://linkedin.com/Astoundify" class="sample-social-linkedin"><img src="/assets/images/sample/linkedin.jpg"></a></center> -->         
          </div>
        </div>     
      </div>
    </div>  
  </div>
  <div class="space_footer"></div>
</div>
<?php
  $relatedData = ["data1","data2","data3","data4","data5","data6","data7","data8","data9","data10","data11","data12"];
?>
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
          <div class="col-xs-6">           
            <li title="{{$batchesOfInstitute[$index]->subcategory}}, {{$batchesOfInstitute[$index]->institute}}, {{$batchesOfInstitute[$index]->locality}} - {{$batchesOfInstitute[$index]->location}}">
              <a class="text_over_flow_hide" href="/batches/show/{{$batchesOfInstitute[$index]->id}}">
                {{$batchesOfInstitute[$index]->subcategory}}, {{$batchesOfInstitute[$index]->institute}}
              </a>
            </li>
          </div>          
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
          <div class="col-xs-6">            
            <li title="{{$institutesOfSubcategoryInLocality[$index]->institute}}">
              <a class="text_over_flow_hide" href="/filter/institute/{{$institutesOfSubcategoryInLocality[$index]->id}}">
                {{$institutesOfSubcategoryInLocality[$index]->institute}}
              </a>
            </li>
          </div>        
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
          <div class="col-xs-6">            
              <li title="{{$subcategoriesInLocality[$index]->subcategory}} classes in {{$locality}}">
                <a class="text_over_flow_hide" href="/filter/{{$subcategoriesInLocality[$index]->id}}/{{$locality_id}}">
                  {{$subcategoriesInLocality[$index]->subcategory}} classes in {{$locality}}
                </a> 
              </li>
          </div>
        @endfor   
      </div>
  </div>
</div>
@stop
@section('pagejquery')
<script type="text/javascript">
  var dateToday = new Date();
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
          dateFormat: 'yy-mm-dd'         
      });    
  });
</script>
@stop