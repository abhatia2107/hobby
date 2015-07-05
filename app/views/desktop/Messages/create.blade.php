@extends('Layouts.layout')
@section('content')
<div class="container">
	
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
		<form action='/messages' id="messageForm" method='post' enctype="multipart/form-data" method="post">
            <h3>Send your message</h3>
            <div class="form-group row">
            	<input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Contact Number" required="required">
            </div>
            <div class="form-group row">
                <textarea class="form-control" rows="4" name='message' id="message" placeholder="Type your message." required="required"></textarea>
            </div>
            <div class="text-center form-group row">
                <button type="submit" class="btn btn-primary">Submit</button>                   
            </div>
    	</form>
    </div>
    <div class="col-md-4">
    </div>

</div>
@stop


@section('pagejquery')
<script type="text/javascript">
    $(document).ready(function(){  
	$('#messageForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
            fields: {
                contact_no: {
                    message: 'Contact Number should be 10 characters long.',
                    validators:{
                        notEmpty: {
                            message: 'The contact no is required and cannot be empty'
                        },
                        stringLength: {
                            min: 10,
                            max: 10,
                            message: 'Contact Number should be 10 characters long.',
                        }
                        
                    }
                },
                message: {
                    message: 'The message is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The message is required and cannot be empty'
                        },
                        stringLength: {
                            min: 1,
                            max: 160,
                            message: 'The title must be more than 1 and less than 160 characters long'
                        }
                    }
                }
            }
        });
	});
</script>
@stop