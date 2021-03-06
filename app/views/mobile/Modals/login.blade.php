@section("login")
<div class="login_form" >    
        <div class="modal-header">
            <div type="button" class="close" title="Close"  data-dismiss="modal" @if(isset($loginPage)) style="display:none" @endif>
                <span onClick="refreshForm('#loginForm')" aria-hidden="true">&times;</span>
            </div>
            <h3 class="modal-title" id="myModalLabel2">LogIn</h3>
        </div>
        <form name="login" id="loginForm" role="form" method="post" action="/users/login/submit" enctype="multipart/form-data">
            <div class="modal-body">  
                <div class="sign_up_opt" style="margin-bottom:10px">
                        Not a member yet? <a href="/users/signup">Sign Up</a>
                </div>            
                <input type="hidden" name="csrf_token" id="hiddenCSRF" value="{{ csrf_token() }}">
                <div class="form-group inner-addon" >
                     <i class="glyphicon glyphicon-envelope left-addon"></i>
                     <input type="email"  placeholder="Enter Your E-Mail ID" class="form-control " name="email"  id="email" value="@if(isset($userDetails)){{$userDetails->email}}@else{{Input::old('email')}}@endif">
                </div>
                <div class="form-group inner-addon">
                    <i class="glyphicon glyphicon-lock left-addon"></i>
                     <input type="password" class="form-control" name="password" placeholder="Enter Your Password" id="password">
                </div>
                <div class="row">
                    <div class="form-group rememberMe col-md-6 col-sm-6 col-xs-6">                               
                        <label class="control-label">
                            <input name="remember"  value="forever" checked="checked" type="checkbox">
                            Remember Me 
                        </label>                                                             
                    </div>                
                    <div class="forgetPassword col-md-6 col-sm-6 col-xs-6">
                        <a href="/users/password/remind">Forgot Password?</a>
                    </div>
                </div>
                <div class="signin_button"><button type="submit" class="btn btn-primary">LogIn</button></div>
            </div>
        </form>
        <div class="modal-footer">                               
           <a href="/login/fb">
                <button class="btn btn-primary">
                    <span class="glyphicon fa fa-fw fa-facebook"></span>Login Using Facebook
                </button>
            </a>     
        </div>
   
</div>
<script type="text/javascript" >
    $(document).ready(function()
    {        
        $('#loginForm').bootstrapValidator({
            message: 'This value is not valid',           
            fields: {

                password: {
                    message: 'The password is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 20,
                            message: 'The password must be more than 6 and less than 20 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9!@#$-%&_]+$/,
                            message: 'The password can only consist of alphabetical, number and following special symbol !,@,#,$,-,%,&,_'
                        }
                    }
                },

                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email is required and cannot be empty'
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
@show