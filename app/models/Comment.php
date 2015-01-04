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
    	'user_id'=>'required|numeric',
	    'institute_id'=>'required|numeric',
		'comment'=>'required|alpha_num',
	    'rating'=>'required|numeric|min:1|max:5',
    ];
    
    public function updateComment($credentials,$id)
    {
        $updated=DB::table('comment')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 
            
}