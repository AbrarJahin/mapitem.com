<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddNotification extends Model
{
	protected $table		=	'add_notifications';
	protected $primaryKey	=	null;
	public $incrementing	=	false;

	protected $fillable		=	[
									'advertisement_id',
									'new_offers'
								];

	protected $hidden =		[
								'advertisement_id'
							];
}
