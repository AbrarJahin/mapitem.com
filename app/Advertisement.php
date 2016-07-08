<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Advertisement extends Model
{
	//use SoftDeletingTrait;

	/**
	* The attributes that should be mutated to dates.
	*
	* @var array
	*/
	protected $dates		=	['deleted_at'];

	protected $table		=	'advertisements';			//Table Name

	protected $fillable		=	[
									'user_id',
									'category_id',
									'sub_category_id',
									'title',
									'price',
									'description',
									'address',
									'location_lat',
									'location_lon',
									'is_active',
									'deleted_at'
								];

	protected $hidden = [
							'user_id',
							'category_id',
							'sub_category_id',
							'deleted_at',
							'created_at',
							'updated_at',
							'is_active',
						];

	public function User()
	{
		return $this->belongsTo('App\User','user_id', 'id');
	}

	public function Category()
	{
		return $this->belongsTo('App\Category','category_id', 'id');
	}

	public function SubCategory()
	{
		return $this->belongsTo('App\SubCategory', 'sub_category_id', 'id');
	}

	public function AdvertisementImages()
	{
		return $this->hasMany('App\AdvertisementImage', 'advertisement_id', 'id');
	}

	public function UserAdvertisementView()
	{
		return $this->hasMany('App\UserAdvertisementView', 'add_id', 'id');
	}

	public function UserReview()
	{
		return $this->hasMany('App\UserReview', 'add_id', 'id');
	}

	//Adding Custom Fields with custom Query - Start
	public $appends =	[
							'total_views',
							'avg_rating',
							'is_reviewed'
						];

		public function getTotalViewsAttribute()
		{	//Defination of -> 'total_views'
			//return $this->UserAdvertisementView->sum('total_view');	//Attribute Collection
			return $this->UserAdvertisementView()->sum('total_view');	//Method - Returns only value - What I need here
		}

		public function getAvgRatingAttribute()
		{	//Defination of -> 'avg_rating'
			return $this->UserReview()->avg('rating');	//Method - Returns only value - What I need here
		}

		public function getIsReviewedAttribute()
		{	//Defination of -> 'is_reviewed'
			if (Auth::check())
				return $this->UserReview()->where('user_id', Auth::user()->id)->count();	//Adding Custom Query
			else
				return 1;
		}
	//Adding Custom Fields with custom Query - END
}
