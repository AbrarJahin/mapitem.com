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

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
