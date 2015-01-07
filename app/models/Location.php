<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Location extends \Eloquent {
    use SoftDeletingTrait;

	protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

	public static $rules = [		
		'location'=>'required',
	];

 	public function updateLocation($credentials,$id)
    {
        $updated=DB::table('locations')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

    public function getLocation($id)
    {
        return DB::table('locations')->where('id','=',$id)->get(['location']);
    }

    public function increment_no($id)
    {
        $updated=DB::table('locations')->where('id','=',$id)->increment('location_no_of_localities');
        return ($updated);
    }

    public function decrement_no($id)
    {
        $updated=DB::table('locations')->where('id','=',$id)->decrement('location_no_of_localities');
        return ($updated);
    }

}