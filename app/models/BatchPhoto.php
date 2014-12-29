<?php

class BatchPhoto extends \Eloquent {

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

	public static $rules = [
		'batch_id'=>'required|numeric',
		'photo_id'=>'required|numeric',
	];
   	public function updateBatchPhoto($credentials,$id)
    {
        $updated=DB::table('batch_photo')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 
}