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
        'institute_location_id'=>'required|numeric',
        'institute_url'=>'required',
        //TO DO: Check institute_website is active_url don't have any error.
        //It might have some bug.
        'institute_website'=>'active_url',
        'institute_description'=>'required',
        'institute_approved'=>'boolean',
    ];

    public function getAllInstitutes()
    {
        return( DB::table('institutes')
            ->leftJoin('locations','institutes.institute_location_id','=','locations.id')
            ->select('*','institutes.id as id','institutes.deleted_at as deleted_at','institutes.created_at as created_at','institutes.updated_at as updated_at')
            ->get());
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

    //Don't convert it to non-static, it's called in filters.php statically.
    public static function getInstituteforUser($institute_user_id)
    {
        return DB::table('institutes')->where('institute_user_id',$institute_user_id)->pluck('id');
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
}