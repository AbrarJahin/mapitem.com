<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

	//Added For calculating Total - Start
		public $appends = ['total_views'];

		public function getTotalViewsAttribute()
		{
			//return $this->UserAdvertisementView->sum('total_view');	//Attribute Collection
			return $this->UserAdvertisementView()->sum('total_view');	//Method - Returns only value - What I need here
		}
	//Added For calculating Total - END
}
