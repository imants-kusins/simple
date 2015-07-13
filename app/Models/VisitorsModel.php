<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorsModel extends Model {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'visitors';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'surname', 'email', 'password', 'phone'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password'];

	protected $dates = ['created_at'];



}
