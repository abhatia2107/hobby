<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Keyword extends \Eloquent {
	use SoftDeletingTrait;

	protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

	public static $rules = [		
		'keyword'=>'required|alpha_dash',
	];

 	public function updateKeyword($credentials,$id)
    {
        $updated=DB::table('keywords')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 
}