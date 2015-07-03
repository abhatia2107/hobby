@section("sendmessage")
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id='close_model' class="close" data-dismiss="modal" aria-hidden="true">
                <span onClick="refreshForm('#sendMessageForm')" aria-hidden="true">X</span>
            </button>
                Send Message To Institute
        </div>
        <div class="modal-body">
            <form action="/batches/sendMessage" method="post" id="sendMessageForm" enctype="multipart/form-data" role="form">
                <input type="hidden" name="csrf_token" value="{{csrf_token()}}">
                <input type="hidden" name="batch">
                <input type="hidden" name="email">
                <input type="hidden" name="institute">

                <div class="form-group inner-addon" >
                     <i class="glyphicon glyphicon-user left-addon"></i>
                     <input type="text" class="form-control" style="padding:0px 0px 0px 30px; " name='msgInputName' id='MsgInputName' placeholder='Enter Your Name' required='required'/>
                </div>
                <div class="form-group inner-addon">
                    <i class="glyphicon glyphicon-envelope left-addon"></i>
                     <input type="email" class="form-control" name='msgInputEmail' id='MsgInputEmail'  placeholder='Enter Your E-Mail Address' required='required'/>
                </div>
                <div class="form-group inner-addon">
                    <i class="glyphicon glyphicon-phone left-addon"></i>
                     <input type="text" class="form-control" name='msgInputNumber' id='msgInputNumber'  placeholder='Enter Your Mobile Number' required='required'/>
                </div>
                <div class="form-group">
                  <label for="comment">Message:</label>
                  <textarea class="form-control" rows="3" name='msgInputMessage' id="comment" required></textarea>
                </div>
                <div class="modal-footer">
                     <button type="submit" class="btn btn-primary booknowButton">Send Message</button>
                </div>
             </form>
        </div>
    </div>
</div>  
<script type="text/javascript" >
    $(document).ready(function(){        
        $('#sendMessageForm').bootstrapValidator({
            message: 'This value is not valid',           
            fields: { 
                msgInputName: {                   
                    validators: {
                        notEmpty: {
                            message: 'Name is required'
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
                MsgInputEmail: {                
                    validators: {
                        notEmpty: {
                            message: 'E-Mail is required'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                },              
                msgInputNumber: {
                    validators: {
                        notEmpty: {
                            message: 'Mobile number is required'
                        },
                        regexp: {
                            regexp: /^[0-9]{10}$/,
                            message: 'Mobile number consists of 10 digits. Skip adding +91 or 0'
                        }
                    }
                },
                msgInputMessage:{
                    validators: {
                        notEmpty: {
                            message: 'Message is required'
                        }
                    }

                }
            }
        });
    });
</script>
@show