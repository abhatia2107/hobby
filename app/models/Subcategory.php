<?php

class Subcategory extends \Eloquent {
	protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

	public static $rules = [		
		'subcategory_category_id'=>'required|numeric',
		'subcategory'=>'required|alpha',
	];

 	public function updateSubcategory($credentials,$id)
    {
        $updated=DB::table('subcategories')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

    public function deleteCategory($id)
    {
    	DB::table('subcategories')->where('subcategory_category_id', '=', $id)->delete();
    }

	public function getSubcategory($id)
    {
        return DB::table('subcategories')->where('id','=',$id)->get(['subcategory_category_id']);
    }

	public function getAllSubcategories()
	{
		return DB::table('subcategories')->Join('categories', 'subcategories.subcategory_category_id', '=', 'categories.id')->get(['subcategories.id','subcategories.subcategory','subcategories.subcategory_category_id','categories.category']);
	}

	public function getSubcategoryForCategory($subcategory_category_id)
    {
    	return DB::table('subcategories')->where('subcategory_category_id','=',$subcategory_category_id)->get();
    }
    
}