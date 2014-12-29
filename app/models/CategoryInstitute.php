<?php

class CategoryInstitute extends \Eloquent {

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

	public static $rules = [
		'category_id'=>'required|numeric',
		'institute_id'=>'required|numeric',
	];

	public function updateCategoryInstitute($credentials,$id)
    {
        $updated=DB::table('category_institute')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

}