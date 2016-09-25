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

	protected $table 		=	'google_login';			//Table Name

	protected $fillable		=	[
									'user_id',
									'token',
									'id',
									'name',
									'email',
									'avatar_url'
								];

	public function user()
	{
		return $this->hasOne('App\User','user_id');
	}
}
