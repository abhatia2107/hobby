<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Locality extends \Eloquent {
	use SoftDeletingTrait;

	protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

	public static $rules = [		
		'locality_location_id'=>'required|numeric',
		'locality'=>'required|alpha',
	];

 	public function updateLocality($credentials,$id)
    {
        $updated=DB::table('localities')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

    public function deleteLocation($id)
    {
    	DB::table('localities')->where('locality_location_id', '=', $id)->delete();
    }

    public function getLocality($id)
    {
        return DB::table('localities')->where('id','=',$id)->get(['locality_location_id']);
    }

	public function getLocalitiesForLocation($locality_location_id)
	{
		if($locality_location_id!=0)
			return DB::table('localities')->where('locality_location_id','=',$locality_location_id)->get();
		else
			return Locality::all();
	}

	public function getAllLocalities()
	{
		return 
		DB::table('localities')->
		// localities::
	//	withTrashed()
		leftJoin('locations', 'localities.locality_location_id', '=', 'locations.id','localities.id as id','localities.deleted_at as deleted_at','localities.created_at as created_at','localities.updated_at as updated_at')
		->select('*','localities.id as id','localities.deleted_at as deleted_at','localities.created_at as created_at','localities.updated_at as updated_at')
        ->get();
	}

	public function disableLocalitiesForLocation($locality_location_id)
    {
		$locality=Locality::where('locality_location_id', '=', $locality_location_id)->delete();
    }
    
    public function enableLocalitiesForLocation($locality_location_id)
    {
		$locality=Locality::withTrashed()->where('locality_location_id', '=', $locality_location_id)->restore();
    }

    public function deleteLocalitiesForLocation($locality_location_id)
    {
		Locality::withTrashed()->where('locality_location_id', '=', $locality_location_id)->forceDelete();
    }
}