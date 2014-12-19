<?php

class BatchPhoto extends \Eloquent {
	protected $table = 'Batch_Photo';
	protected $primaryKey = 'batch_photo_id';

	protected $fillable = [
		'batch_id',
		'photo_id',
	];


	public static $rules = [
		'batch_id'=>'required|numeric',
		'photo_id'=>'required|numeric',
	];

}