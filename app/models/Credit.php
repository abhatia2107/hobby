<?php

class Credit extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

}