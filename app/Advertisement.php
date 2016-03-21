<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
	use SoftDeletes;

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
									'title',
									'description'
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
