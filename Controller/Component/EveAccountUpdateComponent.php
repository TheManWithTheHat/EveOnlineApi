<?php
/**
 * @since	Created on 27 Jun 2012
 * @package	EveOnlineApi
 * @author 	Thies Wandschneider <thies@wandschneider.de>
 * @license 	GNU/LGPL, see COPYING
 * @link 	http://themanwiththehat.wordpress.com
 *
 * This file is part of the EveOnlineApi Plugin for cakePHP 2.
 *
 * The project is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * The project is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this project.  If not, see <http://www.gnu.org/licenses/>.
 */

class EveAccountUpdateComponent extends Component {

	var $components = array('EveOnlineApi.EveOnlineApi');

	var $returndata = array();
	var $returnerror = null;
	var $accessMask = null;
	var $suberror = array();		// Saving error messages from sub requests without canceling the update process

	var $tmpChar = array();
	var $tmpWallet = array();
	
	function initialize(&$controller) {

	}

	public function update($keyID, $vCode, $options = array()) {
		$this->EveOnlineApi->init($keyID, $vCode);
		$result = $this->EveOnlineApi->getAPIKeyInfo();
		if($result) {
			$this->accessMask = $this->EveOnlineApi->response['result']['key']['@accessMask'];
			$this->returndata['accessMask'] = intval($this->EveOnlineApi->response['result']['key']['@accessMask']);
			$this->returndata['type'] = $this->EveOnlineApi->response['result']['key']['@type'];
			$this->returndata['expires'] = $this->EveOnlineApi->response['result']['key']['@expires'];
			$this->returndata['lastvisit'] = time();
			$characters = $this->EveOnlineApi->response['result']['key']['rowset']['row'];
			// Retrieve detailed Account Data
			$result = $this->EveOnlineApi->getAccountStatus();
			if($result) {
				$this->returndata['days_played'] = (time() - strtotime($this->EveOnlineApi->response['result']['createDate']))/60/60/24;
				$this->returndata['paidUntil'] = $this->EveOnlineApi->response['result']['paidUntil'];
				$this->returndata['createDate'] = $this->EveOnlineApi->response['result']['createDate'];
				$this->returndata['logonCount'] = intval($this->EveOnlineApi->response['result']['logonCount']);
				$this->returndata['logonMinutes'] = intval($this->EveOnlineApi->response['result']['logonMinutes']);
			} else {
				//Error Handling
				$this->returnerror = $this->EveOnlineApi->error;
			}
			if(!empty($characters)) {
				foreach($characters as $character) {
					$this->EveOnlineApi->characterID = $character['@characterID'];
					$this->EveOnlineApi->characterName = $character['@characterName'];
					$this->tmpCharData = array();
					$this->tmpCharData['characterID'] = intval($character['@characterID']);
					$this->tmpCharData['characterName'] = $character['@characterName'];
					$this->tmpCharData['corporationID'] = intval($character['@corporationID']);
					$this->tmpCharData['corporationName'] = $character['@corporationName'];
					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterInfo'))) {
						$this->handleSheet($options);
					}
						
					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterContactList'))) {
						$this->handleContactList();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterContactNotifications'))) {
						$this->handleContactNotifications();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterFacWarStats'))) {
						$this->handleFacWarStats();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterIndustryJobs'))) {
						$this->handleIndustryJobs();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterKillLog'))) {
						$this->handleKillLog();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterMailingLists'))) {
						$this->handleMailinglists();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterMailBodies'))) {
						$this->handleMailBodies();
					}
						
					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterMailMessages'))) {
						$this->handleMailMessages();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterMarketOrders'))) {
						$this->handleMarketOrders();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterMedals'))) {
						$this->handleMedals();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterNotificationTexts'))) {
						$this->handleNotificationTexts();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterNotifications'))) {
						$this->handleNotifications();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterStandings'))) {
						$this->handleStandings();
					}
						
					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterResearch'))) {
						$this->handleResearch();
					}

					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterSkillInTraining'))) {
						$this->handleSkillInTraining();
					}
						
					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterSkillQueue'))) {
						$this->handleSkillQueue();
					}
						
					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterUpcomingCalendarEvents'))) {
						$this->handleUpcomingCalendarEvents();
					}

					$this->tmpWallet = array();
					
					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterWalletJournal'))) {
						$this->handleWalletJournal();
					}
						
					if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterWalletTransactions'))) {
						$this->handleWalletTransactions();
					}
					$this->tmpCharData['Wallet'] = $this->tmpWallet;
					
					// Returning Character Data
					$this->returndata['Character'][] = $this->tmpCharData;
				}
			}
		} else {
			//Error Handling
			$returnerror = $this->EveOnlineApi->error;
		}
		// Finally returning
		if($this->returnerror) {
			return $this->returnerror;
		} else {
			return $this->returndata;
		}
	}

	private function handleAccountBalance() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterAccountBalance'] = $this->EveOnlineApi->error;
		}
	}

	private function handleAssetList() {
		//TODO
		$result = true;
		if($result) {
				
		} else {
			//Error Handling
			$this->suberror['CharacterAssetList'] = $this->EveOnlineApi->error;
		}
	}

	private function handleCalendarEventAttendees() {
		//TODO
		$result = true;
		if($result) {
				
		} else {
			//Error Handling
			$this->suberror['CharacterCalendarEventAttendees'] = $this->EveOnlineApi->error;
		}
	}

	private function handleSheet($options) {
		$result = $this->EveOnlineApi->getCharacterSheet();
		if($result) {
			$this->tmpCharData['skills'] = 0;
			$this->tmpCharData['skillpoints'] = 0;
			$this->tmpCharData['lvl0skills'] = 0;
			$this->tmpCharData['lvl1skills'] = 0;
			$this->tmpCharData['lvl2skills'] = 0;
			$this->tmpCharData['lvl3skills'] = 0;
			$this->tmpCharData['lvl4skills'] = 0;
			$this->tmpCharData['lvl5skills'] = 0;
			$this->tmpCharData['certificates'] = 0;
			foreach($this->EveOnlineApi->response['result'] as $key => $value) {
				if(!is_array($value)) {
					$this->tmpCharData[$key] = $value;
				} else {
					if($key == 'attributes') {
						foreach($value as $attribute => $a) {
							$this->tmpCharData[$attribute] = intval($a);
						}
					} else if($key == 'attributeEnhancers') {
						foreach($value as $attribute => $a) {
							$this->tmpCharData[str_replace('Bonus', '', $attribute).'AugmentatorValue'] = intval($a['augmentatorValue']);
						}
					} else if($key == 'rowset') {
						foreach($value as $rowset) {
							if(!empty($rowset['row'])) {
								foreach($rowset['row'] as $row) {
									if($rowset['@name'] == 'skills') {
										if(!empty($options['skillsInSameTable'])) {
											$this->tmpCharData['skill' . $row['@typeID'] . 'level'] = intval($row['@level']);
											$this->tmpCharData['skill' . $row['@typeID'] . 'points'] = intval($row['@skillpoints']);
										} else {
											$this->tmpCharData['Skill'][] = array(
													'characterID' => $this->EveOnlineApi->characterID,
													'typeID' => intval($row['@typeID']),
													'skillpoints' => intval($row['@skillpoints']),
													'level' => intval($row['@level']),
													'published' => intval($row['@published'])
											);
										}
										$this->tmpCharData['lvl'.$row['@level'].'skills']++;
										$this->tmpCharData['skills']++;
										$this->tmpCharData['skillpoints'] += $row['@skillpoints'];
									} else if($rowset['@name'] == 'certificates') {
										$this->tmpCharData['Certificate'][] = array(
												'characterID' => $this->EveOnlineApi->characterID,
												'certificateID' => intval($row['@certificateID'])
										);
										$this->tmpCharData['certificates']++;
									}
								}
							}
						}
					}
				}
			}
		} else {
			//Error Handling
			$this->suberror['CharacterSheet'] = $this->EveOnlineApi->error;
		}
	}

	private function handleContactList() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterContactList'] = $this->EveOnlineApi->error;
		}
	}

	private function handleContactNotifications() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterContactNotifications'] = $this->EveOnlineApi->error;
		}
	}

	private function handleFacWarStats() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterFacWarStats'] = $this->EveOnlineApi->error;
		}
	}

	private function handleIndustryJobs() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterIndustryJobs'] = $this->EveOnlineApi->error;
		}
	}

	private function handleKillLog() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterKillLog'] = $this->EveOnlineApi->error;
		}
	}

	private function handleMailinglists() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterMailinglists'] = $this->EveOnlineApi->error;
		}
	}

	private function handleMailBodies() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterMailBodies'] = $this->EveOnlineApi->error;
		}
	}

	private function handleMailMessages() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterMailMessages'] = $this->EveOnlineApi->error;
		}
	}

	private function handleMarketOrders() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterMarketOrders'] = $this->EveOnlineApi->error;
		}
	}

	private function handleMedals() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterMedals'] = $this->EveOnlineApi->error;
		}
	}

	private function handleNotificationTexts() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterNotificationTexts'] = $this->EveOnlineApi->error;
		}
	}

	private function handleNotifications() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterNotifications'] = $this->EveOnlineApi->error;
		}
	}

	private function handleStandings() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterStandings'] = $this->EveOnlineApi->error;
		}
	}

	private function handleResearch() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterResearch'] = $this->EveOnlineApi->error;
		}
	}

	private function handleSkillInTraining() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterSkillInTraining'] = $this->EveOnlineApi->error;
		}
	}

	private function handleSkillQueue() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterSkillQueue'] = $this->EveOnlineApi->error;
		}
	}

	private function handleWalletJournal($last_transaction = 0, $limit = 500) {
		$params = array('rowCount' => 50);
		$walking = true;
		$transactions_to_process = array();
		$nextlast_transaction = $last_transaction;
		$entries_found = 0;
		while ($walking) {
			$wallet = $this->EveOnlineApi->getCharacterWalletJournal($params);
			if($wallet) {
				$number_of_entries = count($this->EveOnlineApi->response['result']['rowset']['row']);
				if($number_of_entries < $params['rowCount']) {
					$walking = false;
				}
				foreach ($this->EveOnlineApi->response['result']['rowset']['row'] as $transaction) {
					if(empty($lowest_refID) || $lowest_refID > $transaction['@refID']) {
						$lowest_refID = $transaction['@refID'];
					}
					if($last_transaction > $transaction['@refID']) {
						$walking = false;
					}
					$entries_found++;
				
					
					if ($transaction['@refID'] > $last_transaction || !$last_transaction) {
						if(!empty($transaction['@refTypeID']) && (0 < floatval($transaction['@amount']) || floatval($transaction['@amount']) < 0)) {
							$this->tmpWallet[$transaction['@refID']] = array(
									'date' => $transaction['@date'],
									'refTypeID' => intval($transaction['@refTypeID']),
									'sender_characterID' => intval($transaction['@ownerID1']),
									'sender_characterName' => $transaction['@ownerName1'],
									'receiver_characterID' => intval($transaction['@ownerID2']),
									'receiver_characterName' => $transaction['@ownerName2'],
									'argID' => isset($transaction['@argID']) ? intval($transaction['@argID']) : null,
									'argName' => isset($transaction['@argName']) ? $transaction['@argName'] : null,
									'reason' => $transaction['@reason'],
									'amount' => floatval($transaction['@amount']),
									'taxReceiverID' => isset($transaction['taxReceiverID']) ? intval($transaction['taxReceiverID']) : null,
									'taxAmount' => isset($transaction['@taxAmount']) ? $transaction['@taxAmount'] : null 
							);								
						}
					}
					$this->tmpCharData['last_walletjournal'] = $nextlast_transaction;
				}
				if($entries_found >= $limit) {
					$walking = false;
				}
				$params['fromID'] = $lowest_refID;
			} else {
				//Error Handling
				$this->suberror['CharacterWalletTransactions'] = $this->EveOnlineApi->error;
				$walking = false;
				break;
			}
		}
	}

	private function handleWalletTransactions($last_transaction = null) {
		$params = array('rowCount' => 250);
		$walking = true;
		$transactions_to_process = array();
		$nextlast_transaction = $last_transaction;
		while ($walking){
			$wallet = $this->EveOnlineApi->getCharacterWalletTransactions($params);
			if($wallet) {
				//check for exhaust.
				if (empty($this->EveOnlineApi->response['result']['rowset']['row']) || count($this->EveOnlineApi->response['result']['rowset']['row']) == 0){
					$walking = false;
					break;
				}
				foreach ($this->EveOnlineApi->response['result']['rowset']['row'] as $transaction){
					//Stop walking?
					$walking = false;
				
					if ($transaction['@transactionID'] > $last_transaction) {
						$transactions_to_process[] = $transaction;
						if (!isset($params['fromID']) || (isset($params['fromID']) && $params['fromID'] > $transaction['@transactionID'])){
							$params['fromID'] = $transaction['@transactionID'];
							//smaller id found - continue walking
							$walking = true;
						}
						if($transaction['@transactionID'] > $nextlast_transaction) {
							$nextlast_transaction = $transaction['@transactionID'];
						}
					}
				}
				$this->tmpCharData['last_transaction'] = intval($nextlast_transaction);
			} else {
			//Error Handling
			$this->suberror['CharacterWalletTransactions'] = $this->EveOnlineApi->error;
			}
		}	
		// Combining WalletTransactions and WalletJournal
		if(!empty($transactions_to_process)) {
			foreach($transactions_to_process as $transaction) {
				if(floatval($transaction['@price']) < 0 || floatval($transaction['@price']) > 0) {
					$this->tmpWallet[$transaction['@journalTransactionID']]['date'] = $transaction['@transactionDateTime'];
					$this->tmpWallet[$transaction['@journalTransactionID']]['transactionType'] = $transaction['@transactionType'];
					if($transaction['@transactionType'] == 'buy') {
						$this->tmpWallet[$transaction['@journalTransactionID']]['sender_characterID'] = $transaction['@clientName'];
						$this->tmpWallet[$transaction['@journalTransactionID']]['sender_characterName'] = intval($transaction['@clientID']);
						$this->tmpWallet[$transaction['@journalTransactionID']]['receiver_characterID'] = $this->EveOnlineApi->characterID;
						$this->tmpWallet[$transaction['@journalTransactionID']]['receiver_characterName'] = $this->EveOnlineApi->characterName;
					} else {
						$this->tmpWallet[$transaction['@journalTransactionID']]['sender_characterID'] = $this->EveOnlineApi->characterID;
						$this->tmpWallet[$transaction['@journalTransactionID']]['sender_characterID'] = $this->EveOnlineApi->characterName;
						$this->tmpWallet[$transaction['@journalTransactionID']]['receiver_characterID'] = intval($transaction['@clientID']);
						$this->tmpWallet[$transaction['@journalTransactionID']]['receiver_characterName'] = $transaction['@clientName'];
					}
					$this->tmpWallet[$transaction['@journalTransactionID']]['typeName'] = $transaction['@typeName'];
					$this->tmpWallet[$transaction['@journalTransactionID']]['typeID'] = intval($transaction['@typeID']);
					$this->tmpWallet[$transaction['@journalTransactionID']]['stationID'] = intval($transaction['@stationID']);
					$this->tmpWallet[$transaction['@journalTransactionID']]['stationName'] = $transaction['@stationName'];
					$this->tmpWallet[$transaction['@journalTransactionID']]['quantity'] = intval($transaction['@quantity']);
					$this->tmpWallet[$transaction['@journalTransactionID']]['price'] = floatval($transaction['@price']);
				}
			}
		}	
		//debug($this->tmpWallet);
	}

	private function handleUpcomingCalendarEvents() {
		//TODO
		$result = true;
		if($result) {

		} else {
			//Error Handling
			$this->suberror['CharacterUpcomingCalendarEvents'] = $this->EveOnlineApi->error;
		}
	}
}
