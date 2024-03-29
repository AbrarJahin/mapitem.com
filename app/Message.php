<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $table 		=	'messages';

	protected $fillable =	[
								'thread_id',
								'message',
								'sender_id',
								'receiver_id',
								'is_read'
							];

	protected $hidden = [
							'id'
						];
}
