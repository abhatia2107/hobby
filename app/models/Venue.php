<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Venue extends \Eloquent {
	use SoftDeletingTrait;

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
		'venue_email'=>'required|email|unique:venues',
		'venue_contact_no'=>'required|unique:venues|unique:venues,venue_alternate_contact_no|regex:/[0-9]{10}/',
		'venue_alternate_contact_no'=>'different:venue_contact_no|unique:venues|unique:venues,venue_contact_no|regex:/[0-9]{10}/',
        'venue_user_id'=>'required|numeric',
		'venue_institute_id'=>'required|numeric',
	];	
 	public function updateVenue($credentials,$id)
    {
        $updated=DB::table('venues')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

    public function getVenueForInstitute($institute_id)
    {
        return Venue::where('venue_institute_id',$institute_id)
		        	->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
		            ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                    ->select('*','venues.id as id','venues.deleted_at as deleted_at','venues.created_at as created_at','venues.updated_at as updated_at')
		            ->get();
    }
    
    public function getVenueForUser($user_id)
    {
	    return Venue::where('venue_user_id',$user_id)
	        	->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
	            ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                ->select('*','venues.id as id','venues.deleted_at as deleted_at','venues.created_at as created_at','venues.updated_at as updated_at')
	            ->get();
    }

    public static function getUserforVenue($id)
    {
        $venue= Venue::withTrashed()->find($id);
        if($venue){
            if(is_null($venue->deleted_at))
                return $venue->venue_user_id;
            else
                return null;
        }
        else
            return false;
    }

    public static function getInstituteforVenue($id)
    {
        $venue= Venue::withTrashed()->find($id);
        if($venue){
            if(is_null($venue->deleted_at))
                return $venue->venue_institute_id;
            else
                return null;
        }
        else
            return false;
    }
}