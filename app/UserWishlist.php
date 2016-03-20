<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWishlist extends Model
{
    protected $table 		=	'user_wishlists';			//Table Name
	public $timestamps		=	["created_at"]; 		// enable only to created_at

	protected $fillable		=	[
									'user_id',
									'advertisement_id'
								];
}
