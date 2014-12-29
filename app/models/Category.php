<?php

class Category extends \Eloquent {

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
        
	public static $rules = [
		'category'=>'required|alpha',
	];

	public function updateCategory($credentials,$id)
    {
        $updated=DB::table('category')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

}