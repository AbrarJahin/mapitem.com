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
								'profile_picture',
								'first_name',
								'last_name',
								'email',
								'cell_no',
								'website',
								'date_of_birth',
								'social_security_number_p1',
								'social_security_number_p2',
								'social_security_number_p3',
								'address',
								'location_latitude',
								'location_longitude',
								'password',
								'is_fb_verified',
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

	public function FbLogin()
	{
		return $this->hasOne('App\FbLogin', 'user_id');
	}

	public function GoogleLogin()
	{
		return $this->hasOne('App\GoogleLogin', 'user_id');
	}

	public function Advertisement()
	{
		return $this->hasMany('App\Advertisement', 'user_id');
	}

	public function UserWishlist()
	{
		return $this->hasMany('App\UserWishlist', 'user_id');
	}
}
