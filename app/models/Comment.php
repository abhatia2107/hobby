<?php

class Comment extends \Eloquent {
	protected $table = 'Comments';
	protected $primaryKey = 'comment_id';

	protected $fillable = [
		'user_id',
	    'institute_id',
		'comment',
	    'rating',
	];

	public static $rules = [
    	'user_id'=>'required|numeric',
	    'institute_id'=>'required|numeric',
		'comment'=>'required|alpha_num',
	    'rating'=>'required|numeric|min:1|max:5',
    ];
                     
}