<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\TheTimes\CampaignData as CampaignData;

use App\Http\Requests\CreateCampaignRequest as CreateCampaignRequest;

use App\Models\CampaignModel as CampaignModel;

class CampaignController extends Controller {

	protected $campaignData;

	protected $campaign;

	public function __construct(CampaignData $data)
	{
		$this->campaign = $data;
	}

	/**
	 * Display all existing campaigns.
	 *
	 * @return Response
	 */
	public function index()
	{

		return view('public.pages.all_campaigns')->with('campaigns', CampaignModel::all()->toArray());
	}


	/**
	 * Display single campaign.
	 *
	 * @return Response
	 */
	public function viewSingleCampaign($id)
	{

		$campaign = CampaignModel::findOrFail($id)->toArray();
		
		return view('public.pages.single_campaign')->with([
			'messages'	=> $this->campaign->getCampaignMessages($campaign["campaign_inbox_id"]),
			'campaign'	=> $campaign
		]);
	}


	public function findWinners()
	{
		$params = \Request::all();
		//dd($params);
		$campaign = CampaignModel::findOrFail($params["campaign_id"])->toArray();

		
		// $params["number_of_runs"]
		$this->campaignData = $this->campaign->findWinners($params["number_of_runs"]);
		return view('public.pages.single_campaign')->with([
			'messages' 	=> $this->campaignData,
			'campaign'	=> $campaign,
			'search_value'	=> $params["number_of_runs"]
		]);
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
	public function store(CreateCampaignRequest $request)
	{
		// TODO create Campaign model and 
		CampaignModel::create(\Request::all());

		return redirect('campaigns');
	}

	
	public function downloadCsv($campaignId, $onlyWinners = false)
	{
	    $headers = [
	            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
	        ,   'Content-type'        => 'text/csv'
	        ,   'Content-Disposition' => 'attachment; filename=campaign.csv'
	        ,   'Expires'             => '0'
	        ,   'Pragma'              => 'public'
	    ];

	    $list = $this->campaign->getCampaignMessages($campaignId);

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
