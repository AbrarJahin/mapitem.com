<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
	protected $table 		=	'user_reviews';			//Table Name

	protected $primaryKey	=	null;
	public $incrementing	=	false;

	protected $fillable		=	[
									'user_id',
									'add_id',
									'review',
									'rating'
								];

	public function user()
	{
		return $this->hasOne('App\User','user_id');
	}

	public function advertisement()
	{
		return $this->hasOne('App\advertisement','add_id');
	}

	//Adding Check Constraints - In a diffferent way what Laravel Supports - Because Migration has no support for this
	public function setRatingAttribute($value)
	{
		if($value<1)
			$this->attributes['rating']=1;
		else if($value>5)
			$this->attributes['rating']=5;
		else
			$this->attributes['rating'] = $value;
	}
}
