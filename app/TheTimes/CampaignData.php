<?php namespace App\TheTimes;

use App\TheTimes\TextLocal as TextLocal;

class CampaignData
{

	private $_USERNAME	= 'me@leebooth.com';
	private $_API_HASH 	= '04de81a3e9281684c3a2e23abfdc41e27f6fc63f';
	private $_INBOX_ID;

	public function __construct($inboxId = '760434')
	{
		$this->_INBOX_ID = $inboxId;

		dd($this->getInbox());
	}

	public function getInbox()
	{
		
		$data = '&inbox_id=' . $this->_INBOX_ID;
	 	
	 	return $this->sendRequest($data);
	}


	protected function getApiUsername()
	{
		return urlencode($this->_USERNAME);
	}


	protected function getApiHash()
	{
		return urlencode($this->_API_HASH);
	}

	private function sendRequest($data)
	{
		// Send the GET request with cURL
		$ch = curl_init('https://api.txtlocal.com/get_messages/?username=' . $this->getApiUsername() . '&hash=' . $this->getApiHash() . $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		
		
		return json_decode($response, true);
	}

}