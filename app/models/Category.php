<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends \Eloquent {
    use SoftDeletingTrait;

    protected $guarded = [
        'id',
        'category_no_of_subcategories',
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

    public function getCategory($id)
    {
        return DB::table('categories')->where('id','=',$id)->get(['category']);
    }

    public function increment_no($id)
    {
        $updated=DB::table('categories')->where('id','=',$id)->increment('category_no_of_subcategories');
        return ($updated);
    }

    public function decrement_no($id)
    {
        $updated=DB::table('categories')->where('id','=',$id)->decrement('category_no_of_subcategories');
        return ($updated);
    }
}