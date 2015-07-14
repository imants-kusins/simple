<?php namespace App\TheTimes;

use App\TheTimes\TextLocal as TextLocal;

use  Carbon\Carbon as Carbon;

class CampaignData
{

	private $_USERNAME	= 'me@leebooth.com';
	private $_API_HASH 	= '04de81a3e9281684c3a2e23abfdc41e27f6fc63f';
	private $_INBOX_ID;

	public function __construct($inboxId = '760434')
	{
		$this->_INBOX_ID = $inboxId;

		//dd($this->getInbox());
	}


	public function getCampaignMessages()
	{
		$returnMessages = [];

		$inboxData = $this->getInbox();
		foreach ($inboxData["messages"] as $k => $message) {
			$returnMessages[$message["id"]]["entry_time"] = date('H:i', strtotime($message["date"]));
			$returnMessages[$message["id"]]["entry_date"] = date('d/m/Y', strtotime($message["date"]));
			$returnMessages[$message["id"]]["phone_number"] = $message["number"];
			$returnMessages[$message["id"]]["keyword"] = $this->findKeywords($message["message"]);
			$returnMessages[$message["id"]]["email_address"] = $this->findEmailAddress($message["message"]);
		}

		return $returnMessages;
	}


	protected function findEmailAddress($message)
	{
		if (is_array($message)) {
			foreach (explode(' ', $message) as $keyword) {
				
			}

			return $email;

		} else {
			return 'no email address found';
		}
		
	}

	protected function findKeywords($message, $keywords = ['Times'])
	{
		foreach ($keywords as $keyword) {
			if ( ! str_contains($message, $keyword) ) {
				return false;
			} 
		}

		return $keywords;
	}

	public function getInbox()
	{
		
		$data = '&inbox_id=' . $this->_INBOX_ID . '&sort_order=desc';

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