<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FbLogin extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/

	protected $table		=	'fb_lgin';			//Table Name
	public $timestamps		=	[ "created_at" ];	//Enable only to created_at

	protected $fillable		=	[
									'user_id'
								];

	public function user()
	{
		return $this->hasOne('App\User','user_id');
	}
}
