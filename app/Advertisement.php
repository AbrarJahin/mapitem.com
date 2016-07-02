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
}
