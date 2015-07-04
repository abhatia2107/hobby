@section("review")
<div class="modal-dialog" >
    <div class="modal-content"> 
        <form  onsubmit="return(validateReviewForm())" action='/comments/store/' method='post' id="reviewForm" enctype="multipart/form-data" method="post" id="commentform" class="comment-form details-container" novalidate="">       
            <div class="modal-header">              
                <h4 class="modal-title">Rate Your Last Visit at {{$booking_institute['institute']}}</h4>
            </div>
            <div class="modal-body" style="padding:2% 5% ">            
                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                <input type="hidden" name="comment_institute_id" value="{{$booking_institute['id']}}">              
                <div class="form-group row  reviewInstituteName">
                    <div class="col-xs-12 ratingInput">
                        <input id="comment_rating" name="comment_rating" class="rating" data-min="0" data-max="5" data-step="1" data-show-clear="false"  data-size="xs" >
                    </div>   
                </div>               
                <div class="form-group row">
                    <div class="col-xs-12">                        
                        <textarea class="form-control" rows="4" name='comment' id="comment" placeholder="Tell others what you think about this institute. Would you recommend it and why?"></textarea>
                    </div>
                </div>                
            </div>                        
            <div class="modal-footer">                               
                 <button type="submit" class="booknowButton btn btn-primary">Submit</button>                            
            </div>
        </form>        
    </div>
</div>
@show