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
		'locality'=>'required',
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
	        return Locality::where('locality_location_id',$locality_location_id)
	    	->get()
	    	->sortBy('locality');
		else
			return Locality::all();
	}

	public function getLocalitiesForSubcategory($subcategory_id)
	{
		$loc=Batch::where('batch_subcategory_id',$subcategory_id)
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->select('venue_locality_id')
                        ->get()
        				->lists('venue_locality_id');
        $localities=array_unique($loc);
        return Locality::whereIn('localities.id', $localities)
        				->select('id','locality')
        				->take(5)
        				->get()
        				->sortBy('locality');
	}

	public function getAllLocalities()
	{
		return Locality::where('locality_location_id',1)
		->Join('locations', 'localities.locality_location_id', '=', 'locations.id')
		->select('*','localities.id as id','localities.deleted_at as deleted_at','localities.created_at as created_at','localities.updated_at as updated_at')
		->get()
		->sortBy('locality');
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