<?php

class Institute extends \Eloquent {

    protected $guarded = [
        'id',
        'institute_approved',
        'institute_rating',
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

    public function getInstituteForCategory($id)
    {
        return DB::table('institutes')->whereIn('institutes.id',$id)->Join('venues', 'institutes.id', '=', 'venues.venue_institute_id')->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')->Join('locations', 'locations.id', '=', 'venues.venue_location_id')->get();
    }

    public function getInstituteforUser($institute_user_id)
    {
        return DB::table('institutes')->where('institute_user_id',$institute_user_id)->pluck('id');
    }
}