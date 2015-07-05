<?php

class Msg extends \Eloquent {

	protected $table = "messages";

	// Add your validation rules here
	public static $rules = [
		'contact_no'=>'required|integer|regex:/[0-9]{10}/',
		'message'=>'required|max:160'
	];


	// Don't forget to fill this array
	protected $guarded = [
		'id',
		'created_at',
		'updated_at'
	];


}