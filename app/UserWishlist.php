<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWishlist extends Model
{
    protected $table 		=	'user_wishlists';			//Table Name
	public $timestamps		=	false;

	protected $primaryKey	=	null;
	public $incrementing	=	false;

	protected $fillable		=	[
									'user_id',
									'advertisement_id'
								];

	public function User()
	{
		return $this->belongsTo('App\User','user_id');
	}

	public function Advertisement()
	{
		return $this->belongsTo('App\Advertisement','advertisement_id');
	}
}
