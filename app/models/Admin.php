<?php

class Admin extends \Eloquent {

	protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];
	public static $rules = [
    	'admin_user_id'=>'required|numeric',		  
  	];
   	public function updateAdmin($credentials,$id)
    {
        $updated=DB::table('batch_admin')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

}