<?php

class BatchPhoto extends \Eloquent {
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