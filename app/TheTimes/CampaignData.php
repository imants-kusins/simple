<?php namespace App\TheTimes;

use App\TheTimes\TextLocal as TextLocal;

class CampaignData
{

	private $_USERNAME	= 'me@leebooth.com';
	private $_API_KEY 	= '04de81a3e9281684c3a2e23abfdc41e27f6fc63f';

	public function __construct()
	{
		// $textlocal = new \Textlocal('me@leebooth.com', '04de81a3e9281684c3a2e23abfdc41e27f6fc63f');
	
		// $inbox_id = '6676';
		
		// $response = $textlocal->getMessages($inbox_id);
		// print_r($response);

		// Textlocal account details
		$username = urlencode($this->_USERNAME);
		$hash = urlencode($this->_API_KEY);
		
		// Inbox details
		$inbox_id = '760434';
	 
		// Prepare data for POST request
		$data = 'username=' . $username . '&hash=' . $hash . '&inbox_id=' . $inbox_id;
	 
		// Send the GET request with cURL
		$ch = curl_init('https://api.txtlocal.com/get_messages/?' . $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		
		// Process your response here
		echo $response;


		dd("constructed");
	}
}