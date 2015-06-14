@extends('Layouts.layout')
@section('pagestylesheet')
<style type="text/css">
  .booknowButton, .booknowButton:hover, .booknowButton button:active { background: #3396d1;margin-top: 5px;padding: 5px 25px 5px 25px;border-radius: 0px;border:0px solid;text-align: center; }
  .batchOrderButtons { text-align: center;color: white}
  .batchOrderField {margin-bottom: 4px;}
  .batchOrderField button { border:0px;background-color: #3aa54c;font-size: 15px;color: white;height:30px;padding: 4px;margin-top: 5px; }

</style> 
@stop
@section('content')

<div class="yoga-slider">
    <div class="homepage-cover">
       <div class="container" id="hompage-cover">
            <div class="hobby_search_listings" style="background-color: rgba(0, 0, 0, 0.2);padding:0px 0px 5px 0px;">
                <div>
                    <h2>Hobbyix.com &amp; The Art of Living Presents</h2>
                    <h1>YOGA: A NEW DIMENSION</h1>
                    <h2>21st June 2015 International Day of Yoga</h2>
                </div> 
            </div>
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
                <form role="form" method="post" name="batchOrderForm" enctype="multipart/form-data" id="batchOrderForm" action="/yoga" > 
                    <h3>Mark your presence</h3>
                    <div class="row batchOrderField">
                        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                        <input type="text" placeholder="Enter Name" class="form-control" id="name" name="name" value="@if(isset($user)){{$user->user_first_name.' '.$user->user_last_name}}@endif" required/>
                    </div>
                    <div class="row batchOrderField">
                        <input type="email" placeholder="Enter E-Mail ID" class="form-control" id="email" name="email" value="@if(isset($user)){{$user->email}}@endif" required />
                    </div>
                    <div class="row batchOrderField">
                        <input type="tel" placeholder="Enter Mobile Number" class="form-control" id="contact_no" name="contact_no" value="@if(isset($user)){{$user->user_contact_no}}@endif" required />
                    </div>
                    <div class="row batchOrderField">
                        <select class="form-control" name="locality" >                 
                            @foreach($yoga_locality as $locality)
                                <option value="{{$locality->id}}">{{$locality->locality}}</option>
                            @endforeach
                        </select>
                    </div>
                    Like us on facebook
                    <div class="fb-like" data-href="https://facebook.com/hobbyix" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
                    <div class="row batchOrderButtons">    
                        <button type="submit" style="padding:5px 50px;" class="booknowButton" id="booknowButton">Register for Free</button>
                    </div>              
                </form>
            </div>
        </div>
    </div>
</div>

@stop



@section('pagejquery')
<script type="text/javascript">

  $(document).ready(function () 
  {
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