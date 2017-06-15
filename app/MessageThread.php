<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageThread extends Model
{
	protected $table 		=	'message_threads';
	public $timestamps		=	false;//["created_at"]; 		// enable only to created_at

	protected $fillable =	[
								'sender_id',
								'receiver_id',
								'advertisement_id',
								'title',
								'last_sender_id',
								'is_read'
							];

	protected $hidden = [];
}
