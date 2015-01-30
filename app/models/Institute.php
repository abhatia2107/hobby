<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Institute extends \Eloquent {
    use SoftDeletingTrait;

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
        'institute_url'=>'required',
        //TO DO: Institute_website is active_url have error.
        //It gives error on correct url also.
        // 'institute_website'=>'active_url',
        'institute_description'=>'required',
    ];

    public function getAllInstitutes()
    {
        return( DB::table('institutes')
            ->select('*','institutes.id as id','institutes.deleted_at as deleted_at','institutes.created_at as created_at','institutes.updated_at as updated_at')
            ->get());
    }
    public function getInstitute($id)
    {
        $instituteDetails=Institute::
            withTrashed()
            ->where('institutes.id','=',$id)
            ->Join('users','users.id','=','institutes.institute_user_id')
            ->select('institutes.*','users.user_location','users.user_contact_no')
            ->get();
            // dd($instituteDetails);
            if(!empty((array)($instituteDetails[0])))
                return $instituteDetails[0];
    }

    public function updateInstitute($credentials,$id)
    {
        $updated=DB::table('institutes')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

    public function getInstituteForCategory($id)
    {
        return DB::table('institutes')->whereIn('institutes.id',$id)->Join('venues', 'institutes.id', '=', 'venues.venue_institute_id')->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')->Join('locations', 'locations.id', '=', 'venues.venue_location_id')->get();
    }

    public function getInstituteOneDay($date)
    {
        return Institute::where('created_at','>',$date)->count();
    }

    public function getInstituteActive()
    {
        return Institute::count();
    }

    public function getInstituteDisabled()
    {
        return Institute::onlyTrashed()->count();
    }

    //Don't convert it to non-static, it's called in filters.php statically.
    public static function getInstituteforUser($institute_user_id)
    {
        $institute=Institute::withTrashed()
            ->where('institute_user_id',$institute_user_id)->first();
        if($institute){
            if(is_null($institute->deleted_at))
                return $institute->id;
            else
                return null;
        }
        else
            return false;
    }

    public static function getUserforInstitute($id)
    {
        $institute = Institute::withTrashed()->find($id);
        if($institute){
            if(is_null($institute->deleted_at))
                return $institute->institute_user_id;
            else
                return null;
        }
        else
            return false;
    }

}
