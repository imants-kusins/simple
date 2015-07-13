<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\TheTimes\CampaignData as CampaignData;

use App\User as User;


class MainController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return view('public.pages.login');
	}

	public function createUser()
	{
		$user = new User;
		$user->name = 'admin';
		$user->email = 'admin@eskimo.uk.com';
		$user->password = \Hash::make('eskimo123eskimo');

		$user->save();

		echo "New User Created!";
	}

}
