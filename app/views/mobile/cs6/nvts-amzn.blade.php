@extends('Layouts.layout')
@section('pagestylesheet')
    <style type="text/css">
        .booknowButton, .booknowButton:hover, .booknowButton button:active { background: #3396d1;margin-top: 5px;padding: 5px 25px 5px 25px;border-radius: 0px;border:0px solid;text-align: center; }
        .batchOrderButtons { text-align: center;color: white}
        .batchOrderField {margin-bottom: 4px;}
        .batchOrderField button { border:0px;background-color: #3aa54c;font-size: 15px;color: white;height:30px;padding: 4px;margin-top: 5px; }
        .membership_page_container { margin-top: 20px; font-family: 'Open Sans',sans-serif;color: #333;}

        .membership_page_item {padding: 0px 14px;}

        .membership_card_container { background:#FFF;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
            box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);padding: 5px 5px 5px 5px;margin-bottom: 10px;
        }

        .membership_card { background: url("/assets/images/home/hobbyix_membership_card.gif");background-repeat:no-repeat;background-position:left top;-o-background-size: 100% 100%, auto;
            -moz-background-size: 100% 100%, auto;-webkit-background-size: 100% 100%, auto;background-size: 100% 100%, auto;height: 200px;
        }

        .membership_features_container { background:#FFF;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
            box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);padding: 7px 20px 15px 20px;margin-bottom: 10px;
        }

        .header{  padding: 0px 15px 5px 15px;border-bottom:1px solid;border-color: #20cfb1;font-size: 24px;text-align: center;}

        .membership_features_container li { font-size: 18px;margin-bottom: 15px;}

        li { font-size: 18px;margin-bottom: 5px;}

        .membership_features_container .glyphicon{color: #20cfb1;margin-right: 7px;}

        .page_height_footer {margin-top: 40px;}

        @media (min-width: 920px) { .get_membership li {padding: 0 20px}}

        .membership_card_container input[type=text] { height: 25px; padding: 0px 0px 0px 5px; width: 90%; border-radius: 2px; }

        .get_membership hr {margin: 10px 15px 5px 15px;}
    </style>
@stop
@section('content')
    <div class="container" style="padding-top: 20px;">
        <div class="col-md-6">
            <img src="{{asset('/assets/images/cs6/poster.jpg')}}" class="img-responsive">
            <div class="text-center">
                <h3>Registrations Starting Soon...</h3>
            </div>
        </div>
        <div class="col-md-6 membership_features_container">
            <h3 class="header">
                Novartis vs. Amazon Tennis Ball Cricket Match
            </h3>
            <h4>
                <ul class="membership_features">
           
                   <li>
                      <span class='glyphicon glyphicon-home pin-icon' ></span>
                      <span itemprop="streetAddress">A Zone Sports &amp; Leisure Survey No.87, Marthanda Nagar, Kondapur, Hyderabad, 500084</span>
                   </li>
                   <li>
                      <span class='glyphicon glyphicon-home pin-icon' ></span>
                      Land Mark: Near Sanskriti School <a target="_blank" href="https://www.google.co.in/maps/place/Azone+Sports+%26+Leisure/@17.4742217,78.3542133,15z/">Map</a>
                   </li>
                   <li>
                    <span class='glyphicon glyphicon-phone-alt'></span>
                    <span itemprop="telephone">+91-9100946081</span>
                    </li>
                    <li>
                        <span class='glyphicon glyphicon-time'></span>
                        Saturday, 10 Oct 2015
                    </li>
                    <li>
                        <span class='glyphicon glyphicon-hand-right'></span>
                        This will be a 20 overs match and will be played using tennis ball
                    </li>
                    <li>
                        <span class='glyphicon glyphicon-hand-right'></span>
                        Registration fees: Rs. 250/-  per head
                    </li>
                </ul>
            </h4>

            <div class="col-md-10">
                <a href="/amzn-team" class="btn batchOrderButtons" style="background-color: #FF9800;">Register for Amazon 11</a>
                <a href="/nvts-team" class="btn batchOrderButtons" style="background-color: #00699E;">Register for Novartis 11</a>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 filterOption fb_page">
            <h4>Like us on facebook</h4>
            <div class="fb-like" data-href="https://www.facebook.com/cricsuper6/" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
            {{--<div class="fb-page" data-href="https://www.facebook.com/cricsuper6" data-width="300" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"></div>--}}
            <!---<div class="fb-like" data-href="https://facebook.com/hobbyix" data-layout="standard" data-action="like" data-show-faces="true" data-width="240px" data-share="true"></div>						-->
        </div>
  {{--
      <div class='col-lg-4 col-md-5 col-sm-5 col-xs-12 column' style="margin-bottom:25px">
        <div class="sample-box-small" id='batchOrderSample'>
          <div class='sample-batch-name'>Book This Class</div>
          <form role="form" method="post" name="batchOrderForm" id="batchOrderForm" action="/bookings" > 
            <div class="" id="bookOrderFormStep1">
              <div class="row batchOrderField">
                <div class='col-md-6 col-sm-6 col-xs-6'>Price Per Session</div>
                <div class='col-md-6 col-sm-6 col-xs-6'>: Rs. {{$batchDetails->batch_single_price}} or {{$batchDetails->batch_credit}} Credit</div>
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
                    @if($batchDetails->batch_institute_id!=aol_institute)
                      <input type="text" placeholder="Select Date" class="form-control" id="booking_date" name="booking_date" />
                    @else
                        <select class="form-control" id="aol_dates" name="aol_dates">
                            @if($batchDetails->batch_comment)
                                <option value="{{$batchDetails->batch_comment}}">{{$batchDetails->batch_comment}}</option>
                            @endif
                            @if($batchDetails->batch_tagline)
                                <option value="{{$batchDetails->batch_tagline}}">{{$batchDetails->batch_tagline}}</option>
                            @endif
                            @if($batchDetails->batch_aol_3)
                                <option value="{{$batchDetails->batch_aol_3}}">{{$batchDetails->batch_aol_3}}</option>
                            @endif
                            @if($batchDetails->batch_aol_4)
                                <option value="{{$batchDetails->batch_aol_4}}">{{$batchDetails->batch_aol_4}}</option>
                            @endif
                            @if($batchDetails->batch_aol_5)
                                <option value="{{$batchDetails->batch_aol_5}}">{{$batchDetails->batch_aol_5}}</option>
                            @endif
                            @if($batchDetails->batch_aol_6)
                                <option value="{{$batchDetails->batch_aol_6}}">{{$batchDetails->batch_aol_6}}</option>
                            @endif
                        </select>
                    @endif
                </div>          
              </div>
--}}
    </div>
@stop
