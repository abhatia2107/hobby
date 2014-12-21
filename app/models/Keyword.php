<?php

class Keyword extends \Eloquent {
	protected $primaryKey = 'keyword_id';

	protected $fillable = [
		'keyword',
	];
	public static $rules = [		
		'keyword'=>'required|alpha_dash',
	];
}