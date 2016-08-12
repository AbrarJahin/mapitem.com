<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table 		=	'offers';

    protected $fillable =	[
								'add_id',
								'user_id',
								'price',
								'message'
							];

	public function User()
	{
		return $this->hasOne('App\User','id','user_id');
	}

	public function Advertisement()
	{
		return $this->hasOne('App\advertisement','id','add_id');
	}
}
