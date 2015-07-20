<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Gym extends \Eloquent {

	use SoftDeletingTrait;
	
	protected $table='phyzos';
	protected $guarded=['id'];
	/*
	protected $fillable = [''
		'0','1','2','3','4','5','created_at','updated_at'
		];*/
}