<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table 		=	'offers';

    protected $fillable =	[
								'add_id',
								'sender_id',
								'price',
								'message',
								'status'
							];

	public function User()
	{
		return $this->hasOne('App\User','id','sender_id');
	}

	public function Advertisement()
	{
		return $this->hasOne('App\advertisement','id','add_id');
	}
}
