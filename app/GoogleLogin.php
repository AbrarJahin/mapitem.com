<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleLogin extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/

	protected $table 		=	'google_lgin';			//Table Name
	public $timestamps		=	false; 		// enable only to created_at

	protected $fillable		=	[
									'user_id'
								];

	public function user()
	{
		return $this->hasOne('App\User','user_id');
	}
}
