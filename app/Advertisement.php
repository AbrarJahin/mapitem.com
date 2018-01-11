<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Advertisement extends Model
{
	//use SoftDeletingTrait;
	//protected $dates		=	['deleted_at'];
	use SoftDeletes;
	/**
	* The attributes that should be mutated to dates.
	*
	* @var array
	*/

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
									'is_active'
								];

	protected $hidden = [
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

	public function Offer()
	{
		return $this->hasMany('App\Offer', 'add_id', 'id')->orderBy('created_at');
	}

	public function UserWishlist()
	{
		return $this->hasMany('App\UserWishlist', 'advertisement_id', 'id');
	}

	//Adding Custom Fields with custom Query - Start
	public $appends =	[
							'total_views',
							'avg_rating',
							'is_reviewed',
							'is_offer_sent',
							'is_wishlisted',
							'wishlisted_user_count',
							'reviewed_user_count'
						];

		public function getTotalViewsAttribute()
		{	//Defination of -> 'total_views'
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
				return 0;	//Default Value = Show Review Button
		}

		public function getIsOfferSentAttribute()
		{	//Defination of -> 'is_offer_sent'
			if (Auth::check())
				return $this->Offer()->where('sender_id', Auth::user()->id)->count();	//Adding Custom Query
			else
				return 0;	//Default Value = Show Review Button
		}

		public function getIsWishlistedAttribute()
		{	//Defination of -> 'is_wishlisted'
			if (Auth::check())
				return $this->UserWishlist()->where('user_id', Auth::user()->id)->count();	//Adding Custom Query
			else
				return 0;	//Default Value = Show Not Wishlisted
		}

		public function getWishlistedUserCountAttribute()
		{	//Defination of -> 'wishlisted_user_count'
			return $this->UserWishlist()->count();	//Adding Custom Query
		}

		public function getReviewedUserCountAttribute()
		{	//Defination of -> 'reviewed_user_count'
			return $this->UserReview()->count();	//Adding Custom Query
		}
	//Adding Custom Fields with custom Query - END
}
