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
}