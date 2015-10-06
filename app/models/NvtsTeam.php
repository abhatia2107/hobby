<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class NvtsTeam extends \Eloquent {
	use SoftDeletingTrait;
	protected $fillable = ['name', 'email', 'contact_no', 'booking_id'];

	public static $rules = [
		'name' => 'required',
		'email'	=> 'email|required',
		'contact_no'=> 'required|regex:/[0-9]{10}/',
	];
}