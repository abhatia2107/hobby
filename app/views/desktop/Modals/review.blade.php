@section("review")
<div class="modal-dialog" >
    <div class="modal-content">
        <form action='{{secure_url('/comments/store/')}}' method='post' id="reviewForm" enctype="multipart/form-data" method="post" id="commentform" class="comment-form details-container" novalidate="">       
            <div class="modal-header">              
                <h3 class="modal-title">Rate Your Last Visit at {{$booking_institute['institute']}}</h3>
            </div>
            <div class="modal-body">            
                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                <input type="hidden" name="comment_institute_id" value="{{$booking_institute['id']}}">               
                <div class="form-group row reviewInstituteName" id='rating-input'>                    
                    <div class="col-md-12 ratingInput" >
                        <input name="comment_rating" type="text" id="comment_rating" class="rating" data-min="0" data-max="5" data-step="1" data-show-clear="false"  data-size="sm" required />                                
                    </div>                                                                                                        
                    <div class="col-md-12 ratingInput">
                        <button class="btn btn-primary booknowButton">Didn't Attend The Class</button>
                        
                    </div>
                </div>    

                <div class="form-group row">
                    <div class="col-md-12">                    
                        <textarea class="form-control" rows="4" name='comment' id="comment" placeholder="Tell others what you think about this fitness center. Would you recommend it and why?"></textarea>
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