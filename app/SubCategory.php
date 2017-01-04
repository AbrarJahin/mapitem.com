<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
	protected $table	=	'sub_categories';			//Table Name
	public $timestamps	=	false;

	protected $fillable		=	[
									'category_id',
									'name'
								];

	protected $hidden = [
							'category_id'
						];

	public function Category()
	{
		return $this->hasOne('App\Category', 'id', 'category_id');
	}

	public function Advertisement()
	{
		return $this->hasMany('App\Advertisement', 'sub_category_id', 'id');
	}

	public $appends =	[
							'total_advertisements'
						];

		public function getTotalAdvertisementsAttribute()
		{
			return $this->Advertisement()->count();
		}
}