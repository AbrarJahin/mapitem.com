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

	public function user()
	{
		return $this->hasOne('App\User','user_id','id');
	}

	public function advertisement()
	{
		return $this->hasOne('App\advertisement','add_id','id');
	}
}
