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
		'subcategory_category_id'=>'required|numeric',
		'subcategory'=>'required|alpha',
	];

	public function subcategoriesForCategory($id)
	{
		return DB::table('subcategories')->where('subcategory_category_id','=',$id)->get();
	}

}