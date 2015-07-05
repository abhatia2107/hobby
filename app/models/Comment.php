<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Comment extends \Eloquent {
    use SoftDeletingTrait;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

	public static $rules = [
	    'comment_institute_id'=>'required|numeric',
	    'comment_rating'=>'required|numeric|min:0|max:5',
    ];
    
    public function updateComment($credentials,$id)
    {
        $updated=DB::table('comment')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 
    
    public function getCommentForInstitute($institute_id)
    {
        $comments= Comment::where('comment_institute_id','=',$institute_id)
                        ->Join('users', 'users.id', '=', 'comments.comment_user_id')
                        ->select('comments.*','users.user_name')
                        ->get();
        return $comments;
    }

}