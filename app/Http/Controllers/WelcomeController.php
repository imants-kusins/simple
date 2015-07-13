<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {


	/**
	 * Show the sign ing / register screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('public.pages.home');
	}

}
