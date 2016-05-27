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
									'location_lon'
								];

	public function user()
	{
		return $this->belongsTo('App\User','user_id');
	}

	public function category()
	{
		return $this->belongsTo('App\Category','category_id');
	}
}
