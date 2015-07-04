@section("review")
<div class="modal-dialog" >
    <div class="modal-content"> 
        <form  action='{{secure_url('/comments/store/')}}' method='post' id="reviewForm" enctype="multipart/form-data" method="post" id="commentform" class="comment-form details-container" novalidate="">       
            <div class="modal-header">              
                <h3 class="modal-title">Rate The Last Class You Have Visited</h3>
            </div>
            <div class="modal-body" style="padding:2% 7% ">            
                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                <input type="hidden" name="comment_institute_id" value="{{$booking_institute['id']}}">
                <div class="row reviewInstituteName">
                    <div class="col-md-4">Institute Name</div>
                    <div class="col-md-8 text_over_flow_hide" style="text-align:left;padding-left:7px;">
                        {{$booking_institute['institute']}}
                    </div>
                </div>
                <div class="form-group row" id='rating-input'>                    
                    <div class="col-md-12 maz_pad_z" >
                        <div class="col-md-4 maz_pad_z">
                            <label for="rating" >Rate The Institute</label>
                        </div>
                        <div class="col-md-6 maz_pad_z">
                             <span class="rating" >
                                @for($index = 5; $index > 0;$index--)
                                  <input type="radio" class="rating-input" required
                                      id="rating-input-1-{{$index}}" value="{{$index}}" name="comment_rating">
                                  <label for="rating-input-1-{{$index}}" class="rating-star"></label>
                                @endfor                     
                            </span>                                 
                        </div>                        
                    </div>                                                                        
                </div>               
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="comment">Review:</label>
                        <textarea class="form-control" rows="3" name='comment' id="comment" placeholder="Tell others what you think about this institute. Would you recommend it and why?"></textarea>
                    </div>
                </div>                
            </div>                        
            <div class="modal-footer">                               
                 <button type="submit" class="booknowButton btn btn-primary">Submit</button>                            
            </div>
        </form>        
    </div>
</div>
<script type="text/javascript" >
    $(document).ready(function()
    {        
        $('#reviewForm').bootstrapValidator
        ({
            message: 'Please Sumbit Your Rating',            
            fields: {
                comment_rating: {
                    message: 'Please Sumbit Your Rating',
                    validators: {
                        notEmpty: {
                            message: 'Please Sumbit Your Rating'
                        }
                    }
                },             
            }
        });
    });
</script>
@show