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
        $updated=DB::table('categories')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

    public function categoryName($id)
    {
        return DB::table('categories')->where('id','=',$id)->get(['category']);
    }
}