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
									'add_owner_id',
									'add_id',
									'review',
									'rating'
								];

	protected $hidden = [
							'user_id',
							'add_id',
							'created_at'
						];

	public function user()
	{
		return $this->hasOne('App\User','user_id');
	}

	public function advertisement()
	{
		return $this->hasOne('App\advertisement','add_id');
	}

	//Adding Custom Fields with custom Query - Start
		/*public $appends =	[
								'user'
							];

		public function getUserAttribute()
		{	//Defination of -> 'user_name'
			return $this->User();
		}*/
	//Adding Custom Fields with custom Query - END

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
