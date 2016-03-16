<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FbLogin extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/

	protected $table 		= 'fb_lgin';
	public $timestamps = [ "created_at" ]; // enable only to created_at

	protected $fillable =	[
								'user_id'
							];

	/**
	* The attributes excluded from the model's JSON form.
	*
	* @var array
	*/
	protected $hidden = [
							'password',
							'remember_token',
						];
}
