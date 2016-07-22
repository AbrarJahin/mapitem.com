<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $table 		=	'messages';
	public $timestamps		=	false;//["created_at"]; 		// enable only to created_at

	protected $fillable =	[
								'thread_id',
								'message',
								'sender_id'
							];

	protected $hidden = [
							'id'
						];
}
