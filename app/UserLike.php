<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLike extends Model
{
	protected $table 		=	'user_likes';			//Table Name

	protected $fillable		=	[
									'user_id',
									'advertisement_id'
								];

	public function user()
	{
		return $this->hasOne('App\User','user_id');
	}

	public function advertisement()
	{
		return $this->hasOne('App\advertisement','advertisement_id');
	}
}
