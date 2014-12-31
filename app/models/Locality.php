<?php

class Locality extends \Eloquent {
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
		return DB::table('localities')->where('locality_location_id','=',$locality_location_id)->get();
	}

	public function getAllLocalities()
	{
		return DB::table('localities')->Join('locations', 'localities.locality_location_id', '=', 'locations.id')->get(['localities.id','localities.locality','localities.locality_location_id','locations.location']);
	}

}