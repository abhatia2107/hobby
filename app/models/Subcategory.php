<?php

class Subcategory extends \Eloquent {
	protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];


 	public function updateSubcategory($credentials,$id)
    {
        $updated=DB::table('subcategories')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

	public static $rules = [		
		'category_id'=>'required|numeric',
		'subcategory'=>'required|alpha',
	];
}