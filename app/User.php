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
								'first_name',
								'last_name',
								'email',
								'cell_no_p1',
								'cell_no_p2',
								'cell_no_p3',
								'website',
								'date_of_birth',
								'social_security_number_p1',
								'social_security_number_p2',
								'social_security_number_p3',
								'address',
								'location_latitude',
								'location_longitude',
								'password',
								'user_type',
								'is_enabled'
							];

	protected $hidden = [
							'password',
							'remember_token',
							'id',
							'user_type',
							'is_enabled',
							'created_at',
							'updated_at'
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
