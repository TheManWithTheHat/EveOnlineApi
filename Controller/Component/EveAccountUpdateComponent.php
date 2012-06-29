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

	var $tmpCharData = array();

	var $empty_wallet = array(
			'transactionID' => null,
			'date' => null,
			'refTypeID' => null,
			'transactionType' => null,
			'typeName' => null,
			'typeID'  => null,
			'stationID' => null,
			'stationName' => null,
			'sender_characterID' => null,
			'sender_characterName' => null,
			'receiver_characterID' => null,
			'receiver_characterName' => null,
			'argID' => null,
			'argName' => null,
			'reason' => null,
			'balance' => null,
			'amount' => null,
			'taxReceiverID' => null,
			'taxAmount' => null,
			'buying_quantity' => null,
			'buying_price' => null,
			'buying_totalprice' => null,
			'buying_totalfee' => null,
			'selling_quantity' => null,
			'selling_price' => null,
			'selling_totalprice' => null,
			'selling_totalfee' => null,
			'leftover' => null,
			'relTransactionIDs' => null
	);


	function initialize(&$controller) {

	}

	public function update($keyID, $vCode, $options = array()) {
		$this->EveOnlineApi->init($keyID, $vCode);
		$result = $this->EveOnlineApi->getAPIKeyInfo();
		if($result) {
			$this->accessMask = $this->EveOnlineApi->response['result']['key']['@accessMask'];
			$this->returndata['Account']['keyID'] = $keyID;
			$this->returndata['Account']['vCode'] = $vCode;
			$this->returndata['Account']['accessMask'] = intval($this->EveOnlineApi->response['result']['key']['@accessMask']);
			$this->returndata['Account']['type'] = $this->EveOnlineApi->response['result']['key']['@type'];
			$this->returndata['Account']['expires'] = $this->EveOnlineApi->response['result']['key']['@expires'];
			$this->returndata['Account']['lastvisit'] = time();
			$characters = $this->EveOnlineApi->response['result']['key']['rowset']['row'];
			// Retrieve detailed Account Data
			$result = $this->EveOnlineApi->getAccountStatus();
			if($result) {
				$this->returndata['Account']['days_played'] = (time() - strtotime($this->EveOnlineApi->response['result']['createDate']))/60/60/24;
				$this->returndata['Account']['paidUntil'] = $this->EveOnlineApi->response['result']['paidUntil'];
				$this->returndata['Account']['createDate'] = $this->EveOnlineApi->response['result']['createDate'];
				$this->returndata['Account']['logonCount'] = intval($this->EveOnlineApi->response['result']['logonCount']);
				$this->returndata['Account']['logonMinutes'] = intval($this->EveOnlineApi->response['result']['logonMinutes']);
			} else {
				//Error Handling
				$this->returnerror = $this->EveOnlineApi->error;
			}
			if(!empty($characters)) {
				foreach($characters as $character) {
					$this->EveOnlineApi->characterID = $character['@characterID'];
					$this->EveOnlineApi->characterName = $character['@characterName'];
					$this->tmpCharData = array(	'Character' => array(),
							'Skill' => array(),
							'Certificate' => array(),
							'Wallet' => array()
					);
					$this->tmpCharData['Character']['characterID'] = intval($character['@characterID']);
					$this->tmpCharData['Character']['characterName'] = $character['@characterName'];
					$this->tmpCharData['Character']['corporationID'] = intval($character['@corporationID']);
					$this->tmpCharData['Character']['corporationName'] = $character['@corporationName'];
					if(!$options['disabledCharacterImport']) {
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
	
						if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterWalletJournal'))) {
							$this->handleWalletJournal();
						}
	
						if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterWalletTransactions'))) {
							$this->handleWalletTransactions($options);
						}
						$this->tmpCharData['Character']['lastApiUpdate'] = date('Y-m-d H:i:s', time());
					}
					// Returning Character Data
					$this->returndata['chars'][] = $this->tmpCharData;
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
			$this->tmpCharData['Character']['skills'] = 0;
			$this->tmpCharData['Character']['skillpoints'] = 0;
			$this->tmpCharData['Character']['lvl0skills'] = 0;
			$this->tmpCharData['Character']['lvl1skills'] = 0;
			$this->tmpCharData['Character']['lvl2skills'] = 0;
			$this->tmpCharData['Character']['lvl3skills'] = 0;
			$this->tmpCharData['Character']['lvl4skills'] = 0;
			$this->tmpCharData['Character']['lvl5skills'] = 0;
			$this->tmpCharData['Character']['certificates'] = 0;
			$this->tmpCharData['Character']['cachedUntil'] = $this->EveOnlineApi->response['cachedUntil'];
			foreach($this->EveOnlineApi->response['result'] as $key => $value) {
				if(!is_array($value)) {
					$this->tmpCharData['Character'][$key] = $value;
				} else {
					if($key == 'attributes') {
						foreach($value as $attribute => $a) {
							$this->tmpCharData['Character'][$attribute] = intval($a);
						}
					} else if($key == 'attributeEnhancers') {
						foreach($value as $attribute => $a) {
							$this->tmpCharData['Character'][str_replace('Bonus', '', $attribute).'AugmentatorValue'] = intval($a['augmentatorValue']);
						}
					} else if($key == 'rowset') {
						foreach($value as $rowset) {
							if(!empty($rowset['row'])) {
								foreach($rowset['row'] as $row) {
									if($rowset['@name'] == 'skills') {
										if(!empty($options['skillsInSameTable'])) {
											$this->tmpCharData['Character']['skill' . $row['@typeID'] . 'level'] = intval($row['@level']);
											$this->tmpCharData['Character']['skill' . $row['@typeID'] . 'points'] = intval($row['@skillpoints']);
										} else {
											$this->tmpCharData['Skill'][] = array(
													'characterID' => $this->EveOnlineApi->characterID,
													'typeID' => intval($row['@typeID']),
													'skillpoints' => intval($row['@skillpoints']),
													'level' => intval($row['@level']),
													'published' => intval($row['@published'])
											);
										}
										$this->tmpCharData['Character']['lvl'.$row['@level'].'skills']++;
										$this->tmpCharData['Character']['skills']++;
										$this->tmpCharData['Character']['skillpoints'] += $row['@skillpoints'];
									} else if($rowset['@name'] == 'certificates') {
										$this->tmpCharData['Certificate'][] = array(
												'characterID' => $this->EveOnlineApi->characterID,
												'certificateID' => intval($row['@certificateID'])
										);
										$this->tmpCharData['Character']['certificates']++;
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
					if($transaction['@refID'] > $nextlast_transaction) {
						$nextlast_transaction = $transaction['@refID']; 
					}
					$entries_found++;

					if ($transaction['@refID'] > $last_transaction || !$last_transaction) {
						if(!empty($transaction['@refTypeID']) && (0 < floatval($transaction['@amount']) || floatval($transaction['@amount']) < 0)) {
							$this->tmpCharData['Wallet'][$transaction['@refID']] = $this->empty_wallet;
							$this->tmpCharData['Wallet'][$transaction['@refID']]['characterID'] = $this->EveOnlineApi->characterID;
							$this->tmpCharData['Wallet'][$transaction['@refID']]['transactionID'] = intval($transaction['@refID']);
							$this->tmpCharData['Wallet'][$transaction['@refID']]['date'] = $transaction['@date'];
							$this->tmpCharData['Wallet'][$transaction['@refID']]['refTypeID'] = intval($transaction['@refTypeID']);
							$this->tmpCharData['Wallet'][$transaction['@refID']]['sender_characterID'] = intval($transaction['@ownerID1']);
							$this->tmpCharData['Wallet'][$transaction['@refID']]['sender_characterName'] = (string) $transaction['@ownerName1'];
							$this->tmpCharData['Wallet'][$transaction['@refID']]['receiver_characterID'] = intval($transaction['@ownerID2']);
							$this->tmpCharData['Wallet'][$transaction['@refID']]['receiver_characterName'] = (string) $transaction['@ownerName2'];
							$this->tmpCharData['Wallet'][$transaction['@refID']]['argID'] = isset($transaction['@argID']) ? intval($transaction['@argID']) : null;
							$this->tmpCharData['Wallet'][$transaction['@refID']]['argName'] = isset($transaction['@argName']) ? $transaction['@argName'] : null;
							$this->tmpCharData['Wallet'][$transaction['@refID']]['reason'] = (string) $transaction['@reason'];
							$this->tmpCharData['Wallet'][$transaction['@refID']]['balance'] = floatval($transaction['@balance']);
							$this->tmpCharData['Wallet'][$transaction['@refID']]['amount'] = floatval($transaction['@amount']);
							$this->tmpCharData['Wallet'][$transaction['@refID']]['taxReceiverID'] = isset($transaction['taxReceiverID']) ? intval($transaction['taxReceiverID']) : null;
							$this->tmpCharData['Wallet'][$transaction['@refID']]['taxAmount'] = isset($transaction['@taxAmount']) ? floatval($transaction['@taxAmount']) : null;
						}
					}
					$this->tmpCharData['Character']['last_walletjournal'] = $nextlast_transaction;
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

	private function handleWalletTransactions($options, $last_transaction = null) {
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
					if(empty($this->tmpCharData['Wallet'][$transaction['@journalTransactionID']])) {
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']] = $this->empty_wallet;
					}
					$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['characterID']= $this->EveOnlineApi->characterID;
					$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['transactionID'] = intval($transaction['@journalTransactionID']);
					$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['date'] = $transaction['@transactionDateTime'];
					$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['transactionType'] = $transaction['@transactionType'];
					$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['typeName'] = $transaction['@typeName'];
					$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['typeID'] = intval($transaction['@typeID']);
					$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['stationID'] = intval($transaction['@stationID']);
					$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['stationName'] = $transaction['@stationName'];
					if($transaction['@transactionType'] == 'buy') {
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['sender_characterID'] = $transaction['@clientName'];
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['sender_characterName'] = intval($transaction['@clientID']);
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['receiver_characterID'] = $this->EveOnlineApi->characterID;
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['receiver_characterName'] = $this->EveOnlineApi->characterName;

						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['buying_quantity'] = intval($transaction['@quantity']);
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['buying_price'] = floatval($transaction['@price']);
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['buying_totalprice'] = floatval($transaction['@price']) * intval($transaction['@quantity']);
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['buying_totalfee'] = floatval(0);
					} else {
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['sender_characterID'] = $this->EveOnlineApi->characterID;
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['sender_characterID'] = $this->EveOnlineApi->characterName;
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['receiver_characterID'] = intval($transaction['@clientID']);
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['receiver_characterName'] = $transaction['@clientName'];

						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['selling_quantity'] = intval($transaction['@quantity']);
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['selling_price'] = floatval($transaction['@price']);
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['selling_totalprice'] = floatval($transaction['@price']) * intval($transaction['@quantity']);
						$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['selling_totalfee'] = floatval(0);
					}
					$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['leftover'] = intval($transaction['@quantity']);
					$this->tmpCharData['Wallet'][$transaction['@journalTransactionID']]['relTransactionIDs'] = array();
				}
			}
		}
		if(!empty($options['combineTransactions'])) {
			// Combining matching Sell and Buyorders together
			$this->tmpCharData['Wallet'] =  $this->combineTransactions($this->tmpCharData['Wallet']);
		}
	}

	private function combineTransactions($wallet) {
		// Combining Selling Orders with Buying Orders
		$allsellorders = Set::extract('/Transaction[transactionType=/sell/i][leftover>0]', array('Transaction' => $wallet));
		if(!empty($allsellorders)) {
			foreach($allsellorders as $sellorder) {
				$buyorders = Set::extract('/Transaction[transactionType=/buy/i][typeID='.$sellorder['Transaction']['typeID'].'][leftover>0]', array('Transaction' => $wallet));
				if(!empty($buyorders)) {
					$leftover = $sellorder['Transaction']['leftover'];
					foreach($buyorders as $buyorder) {
						if($leftover > 0) {
							$quantity = 0;
							if($leftover >= $buyorder['Transaction']['leftover']) {
								$quantity = $buyorder['Transaction']['leftover'];
							} else if($leftover < $buyorder['Transaction']['leftover']) {
								$quantity = $leftover;
							}
							if($quantity > 0) {
								// Modifing SellOrder
								$wallet[$sellorder['Transaction']['transactionID']]['leftover'] -= $quantity;
								$wallet[$sellorder['Transaction']['transactionID']]['buying_quantity'] += $quantity;
								$wallet[$sellorder['Transaction']['transactionID']]['buying_totalprice'] +=  $buyorder['Transaction']['buying_totalprice'];
								$wallet[$sellorder['Transaction']['transactionID']]['buying_price'] = $wallet[$sellorder['Transaction']['transactionID']]['buying_totalprice'] / $quantity;
								$wallet[$sellorder['Transaction']['transactionID']]['relTransactionIDs'][] = $buyorder['Transaction']['transactionID'];

								// Modifing BuyOrder
								$wallet[$buyorder['Transaction']['transactionID']]['leftover'] -= $quantity;
								$wallet[$buyorder['Transaction']['transactionID']]['selling_quantity'] += $quantity;
								$wallet[$buyorder['Transaction']['transactionID']]['selling_totalprice'] +=  $sellorder['Transaction']['selling_totalprice'];
								$wallet[$buyorder['Transaction']['transactionID']]['selling_price'] = $wallet[$buyorder['Transaction']['transactionID']]['selling_totalprice'] / $quantity;
								$wallet[$buyorder['Transaction']['transactionID']]['relTransactionIDs'][] = $sellorder['Transaction']['transactionID'];
							}
						}
					}
				}
				//Fees
				$feeorders = Set::extract('/Transaction[date=/'.$sellorder['Transaction']['date'].'/i][refTypeID=54][leftover>0]', array('Transaction' => $wallet));
				if(!empty($feeorders)) {
					foreach($feeorders as $feeorder) {
						$wallet[$sellorder['Transaction']['transactionID']]['selling_totalfee'] += $feeorder['Transaction']['amount'];
						$wallet[$sellorder['Transaction']['transactionID']]['relTransactionIDs'][] = $feeorder['Transaction']['transactionID'];

						$wallet[$feeorder['Transaction']['transactionID']]['leftover'] = 0;
						$wallet[$feeorder['Transaction']['transactionID']]['relTransactionIDs'][] = $sellorder['Transaction']['transactionID'];
					}
				}
			}
		}
		// Combining Buying Orders with Selling Orders
		$allbuyorders = Set::extract('/Transaction[transactionType=/buy/i][leftover>0]', array('Transaction' => $wallet));
		if(!empty($allbuyorders)) {
			foreach($allbuyorders as $buyorder) {
				$sellorders = Set::extract('/Transaction[transactionType=/sell/i][typeID='.$buyorder['Transaction']['typeID'].'][leftover>0]', array('Transaction' => $wallet));
				if(!empty($sellorders)) {
					$leftover = $buyorder['Transaction']['leftover'];
					foreach($sellorders as $sellorder) {
						if($leftover > 0) {
							$quantity = 0;
							if($leftover >= $sellorder['Transaction']['leftover']) {
								$quantity = $sellorder['Transaction']['leftover'];
							} else if($leftover < $sellorder['Transaction']['leftover']) {
								$quantity = $leftover;
							}
							if($quantity > 0) {
								// Modifing SellOrder
								$wallet[$sellorder['Transaction']['transactionID']]['leftover'] -= $quantity;
								$wallet[$sellorder['Transaction']['transactionID']]['buying_quantity'] += $quantity;
								$wallet[$sellorder['Transaction']['transactionID']]['buying_totalprice'] +=  $buyorder['Transaction']['buying_totalprice'];
								$wallet[$sellorder['Transaction']['transactionID']]['buying_price'] = $wallet[$sellorder['Transaction']['transactionID']]['buying_totalprice'] / $quantity;
								$wallet[$sellorder['Transaction']['transactionID']]['relTransactionIDs'][] = $buyorder['Transaction']['transactionID'];
								// Modifing BuyOrder
								$wallet[$buyorder['Transaction']['transactionID']]['leftover'] -= $quantity;
								$wallet[$buyorder['Transaction']['transactionID']]['selling_quantity'] += $quantity;
								$wallet[$buyorder['Transaction']['transactionID']]['selling_totalprice'] +=  $sellorder['Transaction']['selling_totalprice'];
								$wallet[$buyorder['Transaction']['transactionID']]['selling_price'] = $wallet[$buyorder['Transaction']['transactionID']]['selling_totalprice'] / $quantity;

								$wallet[$buyorder['Transaction']['transactionID']]['relTransactionIDs'][] = $sellorder['Transaction']['transactionID'];
							}
						}
					}
				}
			}
		}
		return $wallet;
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
