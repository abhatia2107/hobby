<!DOCTYPE html>
<html>
  <head>
    <title>My Venues</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet"  href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../../public/assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script  src="../../../public/assets/js/jquery-ui-1.7.2.custom.min.js"></script>
    <link type="text/css" rel="stylesheet" href="../../../public/assets/css/jquery-te-1.4.0.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../public/assets/css/jquery-ui-1.7.2.custom.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/assets/css/jquery.richtextarea.css" />
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
    <script  src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script  src="../../../public/assets/js/jquery.richtextarea.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#session1").change(function(e){
                if($("#session1").val()==1)
                {
                    $("#myModal").modal('toggle');
                    e.preventDefault();
                }
            });

            $('#venueform').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    venue: {
                        message: 'The name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The venue is required and cannot be empty'
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'The venue name must be more than 3 and less than 30 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z_ ]+$/,
                                message: 'The venue can only consist of alphabets'
                            }
                        }
                    },

                                       textarea1: {
                        message: 'The text is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The description is required and cannot be empty'
                            },
                            stringLength: {
                                min: 6,

                                message: 'The description must be more than 6  characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_]+$/,
                                message: 'The description can only consist of alphabetical, number and underscore'
                            }
                        }
                    },

                    venue_pincode: {
                                            message: 'The pincode is not valid',
                                            validators: {
                                                notEmpty: {
                                                    message: 'The pincode is required and cannot be empty'
                                                },

                                                regexp: {
                                                    regexp: /^[0-9]+$/,
                                                    message: 'The pincode can contain only digits  '
                                                }
                                            }
                                        },


                    venue_location: {
                        message: 'The city is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The city name is required and cannot be empty'
                            }
                        }
                    },
                    venue_contact_no: {
                        message: 'The number is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The mobile number is required and cannot be empty'
                            },

                            regexp: {
                                regexp: /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/,
                                message: 'The phone number consists of 10 digits'
                            }
                        }
                    }

            }

        });
    });
    </script>
    <style type="text/css">
        .input1
        {
            width:380px;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
               <span class="icon-bar"></span>
            <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li ><a href="./myclasses.html">My Classes</a></li>
            <li ><a href="./profile.html" >My Profile </a></li>
            <li><a href="./bankdetails.html">Bank Details</a></li>
            <li class="active"><a href="./myvenues.html">My Venues</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container" id="profile">
        <div style="margin-left:90px;">
          <div class="row">
            <div class="col-lg-6" >
                <h4 >Venues <span id="venuecount">0</span></h4>
            </div>
            <div class="col-lg-6" >
                <button style="background-color: #3C88FB;color:white;font-size: 16px" class="btn  btn-sm" data-toggle="modal" data-target="#myModal2">Add a venue </button>
            </div>
          </div>
        </div>
              <div class="clearfix visible-lg">
                <div class="">
                    <h4><i class="fa fa-times-circle fa-fw fa-lg"></i></h4>
                    {{$venueDetails}}
                </div>
              </div>
      </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form name="venueform" id="venueform" role="form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel1">Add a Venue</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <label for="venue" class="col-sm-3 control-label ">Venue Name&nbsp;<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text"  class="form-control input1" name="venue"  id="venue">
                                    </div>
                                </div>

                            </div><br>
                            <div class="row">
                                <div class="form-group">
                                    <label for="venue_location" class="col-sm-3 control-label ">City&nbsp;<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <select  class="form-control input1" name="venue_location"  id="venue_location"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
                                    </div>
                                </div>

                            </div><br>
                            <div class="row">
                                <div class="form-group">
                                    <label for="venue_locality" class="col-sm-3 control-label ">Locality&nbsp;<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <select  class="form-control input1" name="venue_locality"  id="venue_locality"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
                                    </div>
                                </div>

                            </div><br>
                            <div class="row">
                                <div class="form-group">
                                    <label for="venue_address" class="col-sm-3 control-label ">Address&nbsp;<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text"  class="form-control input1" name="venue_address"  id="venue_address">
                                    </div>
                                </div>

                            </div><br>
                            <div class="row">
                                <div class="form-group">
                                    <label for="venue_pincode" class="col-sm-3 control-label ">Pincode&nbsp;<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text"  class="form-control input1" name="venue_pincode"  id="venue_pincode">
                                    </div>
                                </div>

                            </div><br>
                            <div class="row">
                                <div class="form-group">
                                    <label for="venue_contact_no" class="col-sm-3 control-label ">mobile&nbsp;<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="tel"  class="form-control input1" name="venue_contact_no"  id="venue_contact_no">
                                    </div>
                                </div>

                            </div><br>
                            <div class="row">
                                <div class="form-group">
                                    <label for="landline" class="col-sm-3 control-label ">LandLine&nbsp;<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text"  class="form-control input1" name="landline"  id="landline">
                                    </div>
                                </div>

                            </div><br>
                            <div class="row">
                                <div class="form-group">
                                    <label for="comments" class="col-sm-3 control-label ">Comments&nbsp;</label>
                                    <div class="col-sm-8">
                                        <textarea   class="form-control input1" name="comments"  id="comments"></textarea>
                                    </div>
                                </div>

                            </div><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  </body>
</html>