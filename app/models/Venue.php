<?php

class Venue extends \Eloquent {

	protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

	public static $rules = [
		'venue'=>'required',
		'venue_location_id'=>'required|numeric',
		'venue_locality_id'=>'required|numeric',
		'venue_pincode'=>'regex:/[0-9]{6}/',
		'venue_address'=>'required',
		'venue_email'=>'required|email',
		'venue_contact_no'=>'regex:/[0-9]{10,11}/',
		'venue_user_id'=>'required|numeric',
		'venue_institute_id'=>'required|numeric',
	];	
 	public function updateVenue($credentials,$id)
    {
        $updated=DB::table('venues')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 


}