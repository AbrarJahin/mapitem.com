<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/

	protected $table 		= 'users';

	protected $fillable =	[
								'full_name',
								'cell_no',
								'email',
								'website',
								'date_of_birth',
								'social_security_number',
								'address',
								'location_latitude',
								'location_longitude',
								'password'
							];

	protected $hidden = [
							'password',
							'remember_token'
						];

	public function fb_login()
	{
		return $this->hasOne('App\FbLogin', 'user_id');
	}

	public function google_login()
	{
		return $this->hasOne('App\GoogleLogin', 'user_id');
	}

	public function advertisement()
	{
		return $this->hasMany('App\Advertisement', 'user_id');
	}
}
