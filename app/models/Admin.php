<?php
class Admin extends \Eloquent {

	protected $guarded = [
		'id',
		'email',
		'created_at',
		'updated_at',
	];
	
	public static $rules = [
		'admin_user_id'=>'required|numeric|unique:admins',
		'email'=>'required|email',	  
	];

	public function updateAdmin($credentials,$id)
	{
		$updated=DB::table('admins')->where('id','=',$id)->update($credentials);
		return ($updated);
	}

	public function getAllAdmins()
	{
		return DB::table('admins')->Join('users', 'admins.admin_user_id', '=', 'users.id')->get(['admins.id','admins.admin_user_id','users.user_first_name','users.user_last_name']);
	}
}