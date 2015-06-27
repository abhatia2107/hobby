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
		'subcategory'=>'required',
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
        return Subcategory::where('subcategory_category_id',1)
		->Join('categories', 'subcategories.subcategory_category_id', '=', 'categories.id')
		->select('*','subcategories.id as id','subcategories.deleted_at as deleted_at','subcategories.created_at as created_at','subcategories.updated_at as updated_at')
        ->get()
        ->sortBy('subcategory');
	}

	public function getSubcategoriesForCategory($subcategory_category_id)
    {
        if($subcategory_category_id!=0)
            return Subcategory::where('subcategory_category_id',$subcategory_category_id)->get()
            ->sortBy('subcategory');
        else
            return Subcategory::all();
    }

    public function getSubcategoryInLocality($venue_locality_id)
    {
        $sub=Batch::where('venue_locality_id',$venue_locality_id)
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->select('batch_subcategory_id')
                        ->get()
                        ->lists('batch_subcategory_id');
        $subcategories = array_unique($sub);
        // dd($subcategories[4]->batch_subcategory_id);
        return Subcategory::whereIn('subcategories.id',$subcategories)
                        ->select('id','subcategory')
                        ->take(12)
                        ->get()
                        ->sortBy('subcategory');
    }

    public function getSubcategoryForInstitute($institute_id)
    {
        $sub=Batch::where('batch_institute_id',$institute_id)
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->select('batch_subcategory_id')
                        ->get()
                        ->lists('batch_subcategory_id');
        $subcategories = array_unique($sub);
        // dd($subcategories[4]->batch_subcategory_id);
        return Subcategory::whereIn('subcategories.id',$subcategories)
                        ->select('id','subcategory')
                        ->take(5)
                        ->get()
                        ->sortBy('subcategory');
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