@extends('Layouts.layout')
@section('content')

    <div class="container">
        <div class="row">
            <h1>Hobbyix Cric Super6</h1>
            <h2>Register a new Team</h2>
        </div>
        <div class="col-md-6">
        {{ Form::open(['url'=>'teams', 'id'=>'teams', 'enctype'=>'multipart/form-data']) }}
        <div class="row batchOrderField">
            <div class='col-md-5 col-sm-4 col-xs-5 text-left'>Team Name*</div>
            <div class='col-md-7 col-sm-8 col-xs-7'>
                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                <input type="text" placeholder="Enter Team Name" class="form-control" id="team_name" name="team_name" value="@if(isset($user)){{$user->user_name}}@endif" required/>
            </div>
        </div>
        <div class="row batchOrderField">
            <div class='col-md-5 col-sm-4 col-xs-5 text-left'>Company/Campus*</div>
            <div class='col-md-7 col-sm-8 col-xs-7'>
                <input type="text" placeholder="Enter your team's Company/Campus" class="form-control" id="company" name="company" value="@if(isset($user)){{$user->user_name}}@endif" required/>
            </div>
        </div>
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
                <input type="tel" placeholder="Enter Mobile Number" class="form-control" id="mobile" name="mobile" value="@if(isset($user)){{$user->user_contact_no}}@endif" required />
            </div>
        </div>
        <div class="row batchOrderField">
            <div class='col-md-5 col-sm-4 col-xs-5 text-left'>No. of Players you have*</div>
            <div class='col-md-7 col-sm-8 col-xs-7'>
                <select class="form-control" id="numberOfSessions" name="no_of_sessions">
                    @for($session=1;$session<=6;$session++)
                        <option value={{$session}}>{{$session}}</option>
                    @endfor
                </select>
            </div>
        </div>
        <hr/>
            <div class="">Amount Payable<span id="orderTotal">: Rs. {{$credentials['payment']}}/-</span></div>
            <input type="hidden" id="payment" name="payment" value="{{$credentials['payment']}}">
            <div class="row batchOrderButtons">
            <button style="padding:5px 50px;background:lightgrey;color:black" class="booknowButton" id="goBackButton" >Go Back</button>
            <button type="submit" style="padding:5px 50px;" class="booknowButton" id="booknowButton" name="pay_cc" value="payment">Pay Now</button>
            <button type="submit" style="padding:5px 58px;background:#36BF6C" class="booknowButton" id="payCredits" name="pay_hobbyix" value="credit">Pay Using Hobbyix Membership</button>
        </div>
    {{ Form::close() }}
{{--

    <div class="col-lg-4 text-center col-lg-offset-4">
            {{Form::label('team_name', 'Team Name')}}
            {{ Form::text('team_name', null, ['class'=>'form-control', 'required']) }}
        </div>
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Player {{$i}}
                    </td>
                    <td>
                        {{ Form::text('name', null, ['class'=>'form-control', 'required']) }}
                    </td>
                    <td>
                        {{ Form::text('email', null, ['class' => 'form-control', 'required']) }}
                    </td>
                    <td>
                        {{ Form::text('mobile', null, ['class' => 'form-control', 'required']) }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <div class="form-group">
                {{Form::submit('Let\'s have fun !!!', ['class'=>'btn btn-lg btn-primary'])}}
            </div>
        </div>
        {{ Form::close() }}--}}
    </div>
        <div class="row"></div>
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
                mobile: {
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
    $(document).ready(function ()
    {
        $('#numberOfSessions').change(function ()
        {
            var sessionsCount = $(this).val();
            var sessionPrice = {{$batchDetails->batch_single_price}};
            var subtotal = sessionPrice*sessionsCount;
            var walletBalance=0;

    </script>
@stop