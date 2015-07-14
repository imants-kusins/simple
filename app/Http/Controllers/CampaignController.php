<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\TheTimes\CampaignData as CampaignData;

class CampaignController extends Controller {

	protected $campaignData;

	public function __construct(CampaignData $data)
	{
		$this->campaignData = $data->getCampaignMessages();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('public.pages.all_campaigns')->with('messages', $this->campaignData);
	}


	public function showWinners()
	{
		return view('public.pages.all_campaigns')->with('messages', $this->campaignData);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('public.pages.create_campaign');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// TODO create Campaign model and 
		dd(\Request::all());
	}

	
	public function downloadCsv()
	{
	    $headers = [
	            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
	        ,   'Content-type'        => 'text/csv'
	        ,   'Content-Disposition' => 'attachment; filename=campaign.csv'
	        ,   'Expires'             => '0'
	        ,   'Pragma'              => 'public'
	    ];
	    //dd($this->campaignData);
	    $list = $this->campaignData;
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
