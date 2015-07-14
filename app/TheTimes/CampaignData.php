<?php namespace App\TheTimes;

use App\TheTimes\TextLocal as TextLocal;

class CampaignData
{

	private $_USERNAME	= 'me@leebooth.com';
	private $_API_HASH 	= '04de81a3e9281684c3a2e23abfdc41e27f6fc63f';
	private $_INBOX_ID	= '760434';

	public function __construct()
	{
		// $textlocal = new \Textlocal('me@leebooth.com', '04de81a3e9281684c3a2e23abfdc41e27f6fc63f');
	
		// $inbox_id = '6676';
		
		// $response = $textlocal->getMessages($inbox_id);
		// print_r($response);

		// Textlocal account details
		
		dd(json_decode($this->getInbox(), true));

	}

	public function getInbox()
	{
		
	 
		// Prepare data for POST request
		$data = 'username=' . $this->_getApiUsername() . '&hash=' . $this->_getApiHash() . '&inbox_id=' . $this->_INBOX_ID;
	 
		// Send the GET request with cURL
		$ch = curl_init('https://api.txtlocal.com/get_messages/?' . $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		
		// Process your response here
		return $response;
	}


	protected function _getApiUsername()
	{
		return urlencode($this->_USERNAME);
	}


	protected function _getApiHash()
	{
		return urlencode($this->_API_HASH);
	}

}