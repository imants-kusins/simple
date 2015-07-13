<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateVisitorRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'first_name'	=> 'required|min:2',
			'surname'		=> 'required|min:2',
			'email'			=> 'required|email|unique:visitors',
			'phone'			=> 'required|min:8'
		];
	}

}
