<?php

class Location extends \Eloquent {

	protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

	public static $rules = [		
		'location'=>'required|alpha',
	];

 	public function updateLocation($credentials,$id)
    {
        $updated=DB::table('locations')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

}