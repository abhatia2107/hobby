<?php

use Carbon\Carbon;

class Promo extends \Eloquent {

    use SoftDeletingTrait;

	// Add your validation rules here
	public static $rules = [
		'promo_code' => 'required|unique:promos',
        'discount_percentage'=> 'max:100',
        'valid_till'=>'required|date',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'promo_code',
        'discount_percentage',
        'cash_discount',
        'max_discount',
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

    public function getValidTillAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

	public function scopeValid($query)
	{
        return $query
		->where('valid_till','>=',Carbon::now())
		->whereRaw('count < max_allowed_count');
    }

	public function scopeExpired($query)
	{
		return $query
		->where('valid_till','<',Carbon::now())
		->OrwhereRaw('count >= max_allowed_count');
	}

	public function codeUsedByUser($promo,$user_id)
	{
		$count=$promo->users()->where('users.id','=',$user_id)->count();
		if($promo->max_allowed_count_per_user>$count)
			return false;
		else
			return true;
	}

	public function users()
	{
		return $this->belongsToMany('User')->withTimestamps();
	}
}