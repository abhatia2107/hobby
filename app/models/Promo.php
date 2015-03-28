<?php

use Carbon\Carbon;

class Promo extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'promo_code' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'promocode',
		'valid_till',
		'count',
		'max_allowed_count',
	];

	// To consider it as carbon date.
	protected $dates = ['valid_till'];

	public function setValidTillAttribute($date)
	{
		$this->attributes['valid_till'] = Carbon::parse($date);
	}

	public function scopeValid($query)
	{
		return $query
		->where('valid_till','>=',Carbon::now())
		->whereRaw('count <= max_allowed_count');
	}

	public function scopeExpired($query)
	{
		return $query
		->where('valid_till','<',Carbon::now())
		->OrwhereRaw('count > max_allowed_count');
	}

	public function users()
	{
		return $this->belongsToMany('User');
	}
}