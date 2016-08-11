<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddNotification extends Model
{
	protected $table		=	'add_notifications';
	protected $primaryKey	=	null;
	public $incrementing	=	false;

	protected $fillable		=	[
									'user_id',
									'advertisement_id',
									'new_offer'
								];

	protected $hidden =		[
								'user_id',
								'advertisement_id'
							];
}
