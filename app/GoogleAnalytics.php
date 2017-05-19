<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleAnalytics extends Model
{
	protected $table		=	'google_analytics';			//Table Name

	protected $fillable		=	[
									'is_enabled',
									'route_name',
									'detail',
									'analytics_script'
								];
}
