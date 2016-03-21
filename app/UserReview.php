<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
	protected $table 		=	'user_reviews';			//Table Name

	protected $fillable		=	[
									'user_id',
									'advertisement_id',
									'review'
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
