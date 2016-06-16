<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisementImage extends Model
{
	public $timestamps		=	false; // disable all behaviour
	protected $table		=	'advertisement_images';			//Table Name

	protected $hidden = [
							'advertisement_id'
						];

	protected $fillable		=	[
									'advertisement_id',
									'image_name'
								];
}
