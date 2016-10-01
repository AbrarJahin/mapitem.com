<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PasswordRecovery extends Model
{
	use			SoftDeletes;
	protected	$table 		=	'password_recoveries';
	public		$timestamps	=	false;

	protected $fillable		=	[
									'user_id',
									'token',
									'request_ip',
									'apply_ip',
									'expire_time'
								];
}
