<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleLogin extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/

	protected $table 		=	'google_lgin';			//Table Name
	public $timestamps		=	["created_at"]; 		// enable only to created_at

	protected $fillable		=	[
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
