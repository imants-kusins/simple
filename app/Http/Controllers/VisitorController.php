<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\VisitorsModel as Visitors;
use App\Http\Requests\CreateVisitorRequest as CreateVisitor;

class VisitorController extends Controller {

	/**
	 * Create a new visitor / user.
	 *
	 * @return Response
	 */
	public function create(CreateVisitor $request)
	{
		Visitors::create($request->all());

		return redirect()->back()->with('successMessage', 'Your data has been successfully added to our database.');
	}


	/**
	 * Delete visitor.
	 *
	 * @return Response
	 */
	public function delete($id)
	{
		$this->middleware('auth');

		$user = Visitors::find($id);
		$user->delete();

		return redirect()->back();
	}



	public function downloadCsv()
	{
	    $headers = [
	            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
	        ,   'Content-type'        => 'text/csv'
	        ,   'Content-Disposition' => 'attachment; filename=visitors.csv'
	        ,   'Expires'             => '0'
	        ,   'Pragma'              => 'public'
	    ];

	    $list = Visitors::all()->toArray();

	    array_unshift($list, array_keys($list[0]));

	   $callback = function() use ($list) 
	    {
	        $FH = fopen('php://output', 'w');
	        foreach ($list as $row) { 
	            fputcsv($FH, $row);
	        }
	        fclose($FH);
	    };

	    return \Response::stream($callback, 200, $headers);
	}

}
