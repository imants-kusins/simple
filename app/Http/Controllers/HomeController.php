<?php namespace App\Http\Controllers;

use App\Models\VisitorsModel as Visitor;

class HomeController extends Controller {


	/**
	 * Create a new controller instance, and check if they're logged in.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('public.pages.user')
				->with('visitors', Visitor::all()->toArray());
	}

}
