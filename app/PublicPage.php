<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicPage extends Model
{
	protected	$table 		=	'public_pages';

	protected $fillable		=	[
									'page_order',
									'url',
									'small_title',
									'big_title',
									'description',
									'is_enabled'
								];

	protected $hidden = [
							'id',
							'created_at',
							'updated_at'
						];
}
