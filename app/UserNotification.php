<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
	protected	$table		=	'user_notifications';
	protected	$primaryKey	=	'user_id';
	public	$incrementing	=	false;

	protected $fillable		=	[
									'user_id',
									'my_adds',
									'offers',
									'inbox'
								];

	protected $hidden =		[
								'user_id',
								'created_at',
								'updated_at'
							];
}
