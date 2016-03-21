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

	public function user()
	{
		return $this->hasOne('App\User','user_id');
	}

	public function advertisement()
	{
		return $this->hasOne('App\advertisement','advertisement_id');
	}

	//Scope Query for view count
	/**
    * Scope a query for a mass Assignment
    *
    * @return \Illuminate\Database\Eloquent\Builder
    */
   /*
   public function scopeInsertData($query,$project_id,$data)
   {
        $bulk_data = array();
        foreach ($data as $value)
        {
            array_push(
                            $bulk_data,
                            array(
                                    'project_id' => $project_id,
                                    'feature_id' => $value
                                )
                        );
        }
       return $query->insert($bulk_data);
	}
	*/
}
