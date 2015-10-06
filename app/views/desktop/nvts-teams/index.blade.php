@extends('Layouts.layout')
@section('content')

    <div class="container">
        <div class="row">
            <h1>Novartis vs. Amazon Tennis Ball Cricket Match</h1>
        </div>
        <div class="col-md-6">
            @if(count($nvts_team)==11)
                <h2>Registration closed as team had already got 11 players. Cheer them up.</h2>
            @else
                <h2>Register in Novartis 11</h2>
                {{ Form::open(['url'=>'nvts-team', 'id'=>'teams', 'enctype'=>'multipart/form-data']) }}
                <div class="row batchOrderField">
                        <div class='col-md-5 col-sm-4 col-xs-5 text-left'>Name*</div>
                        <div class='col-md-7 col-sm-8 col-xs-7'>
                            <input type="text" placeholder="Enter Name" class="form-control" id="name" name="name" value="@if(isset($user)){{$user->user_name}}@endif" required/>
                        </div>
                    </div>
                    <div class="row batchOrderField">
                        <div class='col-md-5 col-sm-4 col-xs-5 text-left'>E-Mail ID*</div>
                        <div class='col-md-7 col-sm-8 col-xs-7'>
                            <input type="email" placeholder="Enter E-Mail ID" class="form-control" id="email_id" name="email" value="@if(isset($user)){{$user->email}}@endif" required />
                        </div>
                    </div>
                    <div class="row batchOrderField">
                        <div class='col-md-5 col-sm-4 col-xs-5 text-left'>Mobile Number*</div>
                        <div class='col-md-7 col-sm-8 col-xs-7'>
                            <input type="tel" placeholder="Enter Mobile Number" class="form-control" id="contact_no" name="contact_no" value="@if(isset($user)){{$user->user_contact_no}}@endif" required />
                        </div>
                    </div>
                    <hr/>
                    <h3><div class="">Amount Payable<span id="orderTotal">: Rs. 250/-</span></div></h3>
                    <input type="hidden" id="payment" name="payment" value="250">
                    <div class="row batchOrderButtons">
                        <button type="submit" class="btn btn-success" id="booknowButton">Pay Now</button>
                    </div>
                    <div class="row batchOrderField"></div>
                {{ Form::close() }}
            @endif
        </div>

        <div class="col-md-6 verticalLine">
            <h2>Already registered in Novartis 11</h2>
            {{HTML::UL( $nvts_team, ['class'=> 'lead'])}}
        </div>
    </div>

@stop


@section('pagejavascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#teams').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    team_name: {
                        validators: {
                            notEmpty: {
                                message: 'Team Name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                message: 'Team Name must be more than 2 characters long'
                            }
                        }
                    },
                    company: {
                        validators: {
                            notEmpty: {
                                message: 'Company/Campus Name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                message: 'Company/Campus Name must be more than 2 characters long'
                            }
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                message: 'Name must be more than 2 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z ]+(?:(?:\\s+|-)[a-zA-Z ]+)*$/,
                                message: 'Name can only consist of alphabets'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email is required and cannot be empty'
                            },
                            emailAddress: {
                                message: 'Input is not a valid email address'
                            }
                        }
                    },
                    contact_no: {
                        message: 'Mobile number is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Mobile number is required and cannot be empty'
                            },

                            regexp: {
                                regexp: /^[0-9]{10}$/,
                                message: 'Mobile number consists of 10 digits. Skip adding +91 or 0'
                            }
                        }
                    }
                }
            });
        });
    </script>
@stop