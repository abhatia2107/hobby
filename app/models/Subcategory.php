<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Subcategory extends \Eloquent {
	use SoftDeletingTrait;

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
        return DB::table('subcategories')
        ->where('id','=',$id)
        ->get(['subcategory_category_id']);
    }

	public function getAllSubcategories()
	{
		return 
		DB::table('subcategories')->
		// Subcategory::
	//	withTrashed()
		leftJoin('categories', 'subcategories.subcategory_category_id', '=', 'categories.id','subcategories.id as id','subcategories.deleted_at as deleted_at','subcategories.created_at as created_at','subcategories.updated_at as updated_at')
		->select('*','subcategories.id as id','subcategories.deleted_at as deleted_at','subcategories.created_at as created_at','subcategories.updated_at as updated_at')
        ->get();
	}

	public function getSubcategoriesForCategory($subcategory_category_id)
    {
    	return DB::table('subcategories')->where('subcategory_category_id','=',$subcategory_category_id)->get();
    }

    public function disableSubcategoriesForCategory($subcategory_category_id)
    {
		$subcategory=Subcategory::where('subcategory_category_id', '=', $subcategory_category_id)->delete();
    }
    
    public function enableSubcategoriesForCategory($subcategory_category_id)
    {
		$subcategory=Subcategory::withTrashed()->where('subcategory_category_id', '=', $subcategory_category_id)->restore();
    }

    public function deleteSubcategoriesForCategory($subcategory_category_id)
    {
		Subcategory::withTrashed()->where('subcategory_category_id', '=', $subcategory_category_id)->forceDelete();
    }
}