<?php namespace App\TheTimes;

use App\TheTimes\TextLocal as TextLocal;

use  Carbon\Carbon as Carbon;

class CampaignData
{

	private $_USERNAME	= 'me@leebooth.com';
	private $_API_HASH 	= '04de81a3e9281684c3a2e23abfdc41e27f6fc63f';
	private $_INBOX_ID;


	protected $phoneNumbers = [];


	/**
	 * Returns all messages in the specified inbox.
	 *
	 * @return mixed
	 */
	public function getCampaignMessages($inboxId = '760434')
	{

		$this->_INBOX_ID = $inboxId;

		$returnMessages = [];

		$inboxData = $this->getInbox();



		if (!empty($inboxData["messages"]))
		{
			$cc = -1;
			foreach ($inboxData["messages"] as $k => &$message) {
				$cc++;

				//$message["message"] = 'times imants@eskimo.uk.com 34';

				if ($this->checkDuplicate($message["number"]) === false) {

					$this->phoneNumbers[] = $message["number"];

					$returnMessages[$cc]["entry_time"] = date('H:i', strtotime($message["date"]));
					$returnMessages[$cc]["entry_date"] = date('d/m/Y', strtotime($message["date"]));
					$returnMessages[$cc]["phone_number"] = $message["number"];
					$returnMessages[$cc]["keyword"] = $this->findKeywords($message["message"]);
					$returnMessages[$cc]["email_address"] = $this->findEmailAddress($message["message"]);
					$returnMessages[$cc]["number_of_runs"] = $this->findNumberOfRuns($message["message"], 3);
					// $returnMessages[$message["id"]]["isValid"] = $this->isMessageValid($message["message"]);
				}
			}
		}

		return $returnMessages;
	}


	/**
	 * Finds the winners in a campaign.
	 *
	 * @return mixed
	 */
	public function findWinners($campaignInboxId, $winningRuns)
	{

		$returnMessages = [];
		//dd($this->getCampaignMessages());
		$messages = $this->getCampaignMessages($campaignInboxId);
		//dd($messages);
		$cc = -1;
		foreach ($messages as $k => $v) {
			if ($v["number_of_runs"] == $winningRuns) {
				$cc++;
				$returnMessages[$cc] = $v;
			}
		}

		return $returnMessages;
	}


	/**
	 * Checks for duplicate phone numbers.
	 *
	 * @return boolean
	 */
	protected function checkDuplicate($phoneNumber)
	{
		if (in_array($phoneNumber, $this->phoneNumbers)) return true;

		return false;
	}


	/**
	 * Finds the number of runs in a message.
	 *
	 * @return string
	 */
	protected function findNumberOfRuns($message, $position)
	{
		$position -= 1;

		$messageArr = explode(' ', $message);

		return (!empty($messageArr[$position]) && is_numeric($messageArr[$position])) ? $messageArr[$position] : false;
	}


	/**
	 * Finds the email address in a message.
	 *
	 * @return string or boolean
	 */
	protected function findEmailAddress($message)
	{
		foreach (explode(' ', $message) as $word) {
			if ( filter_var($word, FILTER_VALIDATE_EMAIL) ) {
				return $word;
			}
		}

		return false;
	}


	/**
	 * Finds the keywords in a message..
	 *
	 * @return string
	 */
	protected function findKeywords($message, $keywords = ['TIMES'], $position = 1)
	{
		$position -= 1;
		$messageArr = explode(' ', $message);

		foreach ($keywords as $keyword) {
			if ( strtoupper($messageArr[$position]) !== strtoupper($keyword) ) {
				return false;
			} 
		}

		return implode(', ', $keywords);
	}


	/**
	 * Gets all the messages from specified inbox.
	 *
	 * @return request
	 */
	public function getInbox()
	{
		
		$data = '&inbox_id=' . $this->_INBOX_ID . '&sort_order=desc';
		// if (1 === 1) {
		// 	$mintime = date_timestamp_get(date('2015-07-14 00:00:01'));
		// 	$maxtime = date_timestamp_get(date('2015-07-15 23:59:59'));
		// 	// echo time();
		// 	// dd( 'd-m-Y', $mintime );
		// 	$data .= '&min_time=' . $mintime . '&max_time=' . $maxtime;
		// 	//dd($data);
		// }
		//1436832000
		//dd(strtotime( date('Y-m-d') ));
		//dd(strtotime('2015-07-15 23:59:59'));

		//$min_time = (new \DateTime('2015-07-14 00:00:01'))->format('c');
		//$max_time = (new \DateTime('2015-07-15 23:59:59'))->format('c');
		//dd($min_time);

		//$data .= '&min_time='. strtotime($min_time);

	 	return $this->sendRequest($data);
	}


	/**
	 * Getter for the API username.
	 *
	 * @return string
	 */
	protected function getApiUsername()
	{
		return urlencode($this->_USERNAME);
	}


	/**
	 * Getter for the API hash..
	 *
	 * @return string
	 */
	protected function getApiHash()
	{
		return urlencode($this->_API_HASH);
	}


	/**
	 * Sends the request to the API.
	 *
	 * @return mixed
	 */
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