<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $guarded = [
		'id',
		'password_confirmation',
		'user_confirmed',
		'created_at',
		'updated_at',
	];

	public static $rules = [
		'user_first_name'=>'required',
	   	'user_email'=>'required|unique:users,user_email',
		'user_contact_no'=>'required|unique:users,user_contact_no|regex:/[0-9]{10,11}/',
		'password'=>'required|confirmed|min:8|regex: /^[a-zA-Z0-9!@#$%&_]+$/',
	    'user_location_id'=>'required',
	    'user_birthdate'=>'date',
	    'user_gender'=>'boolean',
	    'user_confirmed'=>'boolean',                   
	];

	public function updateUser($credentials,$id)
    {
        $updated=DB::table('users')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

    public function userExist($id)
    {
    	if(count(DB::table('users')->where('id','=',$id)->get(['id'])))
	    	return true;
	    else
	    	return false;
    }

    public function getEmailVerified($credentials)
    {
    	$user_email=DB::table('users')->where('id','=',$credentials['admin_user_id'])->get(['user_email']);
    	if($user_email==$credentials['user_email'])
    		return true;
    	else
	    	return false;
    }

	public static $rulesChangePassword=[
		'current_password'=>'required',
		'password'=>'required|confirmed|min:8|regex: /^[a-zA-Z0-9!@#$%&_]+$/',
	];
	public static $uniqueEmail=[
		'user_email'=>'unique:users,user_email',
	];
	public function getUid($uid)
	{
		return DB::select('select * from users where user_fb_id=?',array($uid));
	}
	/**
	*Function To Get 'user_id' From Users Table 
	*@param emailid of the user
	*@return array of userid
	*/
	public function  getid($email)
	{
		return DB::select('select id from users where user_email=?',array($email));
	}
	/**
	*To change the password of the user.
	*@param user_id of the logged in user
	*
	*/
	public function change_password($id)
	{
		
	}
	public function getAuthPassword()
	{
		return $this->password;
	}

}
