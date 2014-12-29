<?php

class Locality extends \Eloquent {
	protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

 	public function updateLocality($credentials,$id)
    {
        $updated=DB::table('localities')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

}