<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAdvertisementView extends Model
{
    protected $table 		=	'user_advertisement_views';			//Table Name

	protected $fillable		=	[
									'user_id',
									'advertisement_id',
									'total_view'
								];
}
