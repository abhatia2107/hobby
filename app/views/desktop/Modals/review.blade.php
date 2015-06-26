@section("review")
<div class="modal-dialog" >
    <div class="modal-content"> 
        <form  action='/comments/store/' method='post' id="reviewForm" enctype="multipart/form-data" method="post" id="commentform" class="comment-form details-container" novalidate="">       
            <div class="modal-header">
                <div type="button" class="close" title="Close"  data-dismiss="modal" @if(isset($loginPage)) style="display:none" @endif>
                    <span onClick="refreshForm('#loginForm')" aria-hidden="true">X</span>
                </div>
                <h3 class="modal-title" id="myModalLabel2">Review</h3>
            </div>
            <div class="modal-body">            
                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                <input type="hidden" name="comment_institute_id" value="$instituteID}}">
                <div class="form-group row" id='rating-input'>                    
                    <div class="col-md-12" >
                        <div class="col-md-6" style="padding:0;margin:0">
                            <label for="rating" >Rate The Last Class You Have Visited:</label>
                        </div>
                        <div class="col-md-6" style="padding:0;margin:0">
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
                <div class="form-group row" id="ReviewForm">
                    <div class="col-md-12">
                        <label for="comment">Review:</label>
                        <textarea class="form-control" rows="3" name='comment' id="comment"></textarea>
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