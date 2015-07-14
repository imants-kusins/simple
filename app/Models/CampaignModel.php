<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignModel extends Model {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'campaigns';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable = [
		'campaign_name',
		'campaign_phone_number',
		'campaign_inbox_id', 
		'campaign_start_date',
		'campaign_end_date',
	 	'duplicate'
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = ['password'];

	//protected $dates = ['created_at'];



}
