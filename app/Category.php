<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table		=	'categories';			//Table Name
	public $timestamps		=	false;
	public $incrementing	=	false;					//For Non integer Primary key
	protected $primaryKey	=	'name';

	protected $fillable		=	[
									'name'
								];

	public function SubCategory()
	{
		return $this->hasMany('App\SubCategory', 'category_id', 'id');
	}

	public function Advertisement()
	{
		return $this->hasMany('App\Advertisement', 'category_id', 'id');
	}

	public $appends =	[
							'total_advertisements'
						];

		public function getTotalAdvertisementsAttribute()
		{
			return $this->Advertisement()->count();
		}
}
