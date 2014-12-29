<?php

class Institute extends \Eloquent {

    protected $guarded = [
        'id',
        'institute_approved',
        'created_at',
        'updated_at',
    ];

	public static $rules = [		
		'institute'=>'required',
        'institute_user_id'=>'required|numeric',
        'institute_location_id'=>'required|numeric',
        'institute_url'=>'required',
        /*TO DO: Check institute_website is active_url
        'institute_website'=>'active_url',*/
        'institute_description'=>'required',
        'institute_approved'=>'boolean',
    ];

    public function updateInstitute($credentials,$id)
    {
        $updated=DB::table('institutes')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

}