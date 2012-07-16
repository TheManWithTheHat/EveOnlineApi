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

	function initialize(&$controller) {

	}

	public function update($user_id, $account_id = null, $keyID = null, $vCode = null, $options = array()) {
		App::import('Model', 'EveOnlineApi.Account');
		$this->Account = new Account();
		if(!empty($account_id)) {
			$this->Account->id = $account_id;
			$this->Account->data = $this->Account->read();
		} else {
			$this->Account->data['Account']['user_id'] = $user_id;
		}
		if(!empty($keyID)) {
			$this->Account->data['Account']['keyID'] = $keyID;
		}
		if(!empty($vCode)) {
			$this->Account->data['Account']['vCode'] = $vCode;
		}
		$this->EveOnlineApi->init($this->Account->data['Account']['keyID'], $this->Account->data['Account']['vCode']);
		$result = $this->EveOnlineApi->getAPIKeyInfo();
		

		if($result) {
			$this->accessMask = $this->EveOnlineApi->response['result']['key']['@accessMask'];
			$this->Account->data['Account']['accessMask'] = intval($this->EveOnlineApi->response['result']['key']['@accessMask']);
			$this->Account->data['Account']['type'] = $this->EveOnlineApi->response['result']['key']['@type'];
			$this->Account->data['Account']['expires'] = $this->EveOnlineApi->response['result']['key']['@expires'];
			$this->Account->data['Account']['lastvisit'] = time();

			$characters = $this->EveOnlineApi->response['result']['key']['rowset']['row'];
			// Retrieve detailed Account Data
			$result = $this->EveOnlineApi->getAccountStatus();
			if($result) {
				$this->Account->data['Account']['days_played'] = (time() - strtotime($this->EveOnlineApi->response['result']['createDate']))/60/60/24;
				$this->Account->data['Account']['paidUntil'] = $this->EveOnlineApi->response['result']['paidUntil'];
				$this->Account->data['Account']['createDate'] = $this->EveOnlineApi->response['result']['createDate'];
				$this->Account->data['Account']['logonCount'] = intval($this->EveOnlineApi->response['result']['logonCount']);
				$this->Account->data['Account']['logonMinutes'] = intval($this->EveOnlineApi->response['result']['logonMinutes']);
			} else {
				//Error Handling
				$this->returnerror = $this->EveOnlineApi->error;
			}
			if($this->Account->save($this->Account->data)) {
				if(!empty($characters)) {
					if(!isset($characters[0])) {
						$characters = array(0 => $characters);
					}
					App::import('Model', 'EveOnlineApi.Character');
					$this->Character = new Character();
					$this->Character->newdata = array();

					// Creating a list of all characters on the eve online account for deleting old characters
					$current_character_list = array();

					foreach($characters as $character) {
						// Adding current character to all characters list
						$current_character_list[] = intval($character['@characterID']);
						$this->Character->id = intval($character['@characterID']);
						$this->Character->data = $this->Character->read();
						$this->EveOnlineApi->characterID = $character['@characterID'];
						$this->EveOnlineApi->characterName = $character['@characterName'];
						$this->tmpCharData['account_id'] = $this->Account->id;
						$this->tmpCharData['characterID'] = intval($character['@characterID']);
						$this->tmpCharData['characterName'] = $character['@characterName'];
						$this->tmpCharData['corporationID'] = intval($character['@corporationID']);
						$this->tmpCharData['corporationName'] = $character['@corporationName'];

						if(empty($options['disabledCharacterImport']) || !$options['disabledCharacterImport']) {
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
								$this->handleWalletJournal(isset($this->Character->data['Character']['last_walletjournal']) ? $this->Character->data['Character']['last_walletjournal'] : null);
							}
	
							if($this->EveOnlineApi->validateAccessMask($this->accessMask, array('CharacterWalletTransactions'))) {
								$this->handleWalletTransactions(isset($this->Character->data['Character']['last_walletjournal']) ? $this->Character->data['Character']['last_walletjournal'] : null, $options);
							}
							$this->tmpCharData['lastApiUpdate'] = date('Y-m-d H:i:s', time());
						}
						// Returning Character Data
						$this->Character->newdata['Character'][] = $this->tmpCharData;
					}
					if(!empty($this->Character->newdata)) {
						if(!$this->Character->saveMany($this->Character->newdata['Character'])) {
							throw new InternalErrorException();
						}
					}
					// Deleting old characters
					if(!empty($current_character_list)) {
						$this->Character->deleteAll(array('Character.account_id' => $this->Account->id,'Character.characterID NOT' => $current_character_list));
					}
				}
			} else {
				return $this->Account;
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
			$this->tmpCharData['cachedUntil'] = $this->EveOnlineApi->response['cachedUntil'];
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
/*
										$this->tmpCharData['Certificate'][] = array(
												'characterID' => $this->EveOnlineApi->characterID,
												'certificateID' => intval($row['@certificateID'])
										);
										$this->tmpCharData['certificates']++;
*/
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

	private function handleWalletJournal($last_transaction = 0, $limit = 2500) {
		$params = array('rowCount' => 250);				
		$walking = true;
		$nextlast_transaction = $last_transaction;
		$entries_found = 0;
		App::import('Model', 'EveOnlineApi.Wallet');
		$this->Wallet = new Wallet();
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
							$tmpWallet = array();
							$tmpWallet['transactionID'] = intval($transaction['@refID']);
							$tmpWallet['characterID'] = $this->EveOnlineApi->characterID;
							$tmpWallet['created'] = date("Y-m-d H:i:s",  strtotime($transaction['@date']));
							$tmpWallet['refTypeID'] = intval($transaction['@refTypeID']);
							$tmpWallet['argID1'] = intval($transaction['@argID1']);
							$tmpWallet['argName1'] = (string) $transaction['@argName1'];					
							$tmpWallet['balance']= floatval($transaction['@balance']);
							$tmpWallet['amount'] = floatval($transaction['@amount']);
							$tmpWallet['taxReceiverID'] = intval($transaction['@taxReceiverID']);
							$tmpWallet['taxAmount'] = floatval($transaction['@taxAmount']);
							if($transaction['@ownerID1'] == $this->EveOnlineApi->characterID) {
								$tmpWallet['other_characterID'] = intval($transaction['@ownerID2']);
								$tmpWallet['other_characterName'] = (string) $transaction['@ownerName2'];
							} else {
								$tmpWallet['other_characterID'] = intval($transaction['@ownerID1']);
								$tmpWallet['other_characterName'] = (string) $transaction['@ownerName1'];
							}
							// Buyer and Seller are sharing the same transactionID. So we can't use the transactionID as primaryKey
							$tmpJournal = $this->Wallet->find('first', array('conditions' => array(
								'Wallet.characterID' => $this->EveOnlineApi->characterID,
								'Wallet.created' => $tmpWallet['created'],
								'Wallet.amount' => $tmpWallet['amount'],
								'Wallet.transactionID' => $tmpWallet['transactionID'],
								),
								'joins' => $this->Wallet->defaultJoins));
							if(!empty($tmpJournal['Wallet']['transactionID'])) {
								$tmpWallet['id'] = $tmpJournal['Wallet']['id'];
							} 
							$this->Wallet->data['Wallet'][] = $tmpWallet;
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
		if(!empty($this->Wallet->data['Wallet'])) {
			if(!$this->Wallet->saveMany($this->Wallet->data['Wallet'], array('atomic' => true))) {
				throw new InternalErrorException();
			}
		}
	}

	private function handleWalletTransactions($last_transaction = null, $options) {
		$params = array('rowCount' => 250);
		$walking = true;
		$transactions_to_process = array();
		$nextlast_transaction = $last_transaction;
		App::import('Model', 'EveOnlineApi.Wallet');
		$this->Wallet = new Wallet();
		while ($walking) {
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
					if ($transaction['@journalTransactionID'] > $last_transaction) {
						if(floatval($transaction['@price']) < 0 || floatval($transaction['@price']) > 0) {
							$tmpWallet = array('id' => null);
							$tmpWallet['transactionID'] = intval($transaction['@journalTransactionID']);
							$tmpWallet['characterID'] = $this->EveOnlineApi->characterID;
							$tmpWallet['created'] = date("Y-m-d H:i:s",  strtotime($transaction['@transactionDateTime']));
							$tmpWallet['refTypeID'] = 2;
							$tmpWallet['transactionFor'] = $transaction['@transactionFor'];
							$tmpWallet['price'] = floatval($transaction['@price']);
							$tmpWallet['quantity'] = intval($transaction['@quantity']);
							$tmpWallet['stationID'] = intval($transaction['@stationID']);
							$tmpWallet['stationName'] = (string) $transaction['@stationName'];
							$tmpWallet['typeID'] = intval($transaction['@typeID']);
							$tmpWallet['typeName'] = (string) $transaction['@typeName'];

							if($transaction['@transactionType'] == 'sell') {
								$tmpWallet['other_characterID'] = intval($transaction['@clientID']);
								$tmpWallet['other_characterName'] = $transaction['@clientName'];
								$tmpWallet['amount'] = floatval($transaction['@quantity'] * $transaction['@price']);
							} else if($transaction['@transactionType'] == 'buy') {
								$tmpWallet['other_characterName'] = (string) $transaction['@clientName'];
								$tmpWallet['other_characterID'] = intval($transaction['@clientID']);
								$tmpWallet['amount'] = floatval(-1 *($transaction['@quantity'] * $transaction['@price']));
							} else {
								// Is there an else ?
							}
							$tmpWallet['quantity_left'] = intval($transaction['@quantity']);

							// Buyer and Seller are sharing the same transactionID. So we can't use the transactionID as primaryKey
							$tmpJournal = $this->Wallet->find('first', array('conditions' => array(
								'Wallet.characterID' => $this->EveOnlineApi->characterID,
								'Wallet.created' => $tmpWallet['created'],
								'Wallet.amount' => $tmpWallet['amount'],
								'OR' => array(
									'Wallet.other_characterID' => $tmpWallet['other_characterID'],
									'Wallet.transactionID' => $tmpWallet['transactionID'],
								)),
								'joins' => $this->Wallet->defaultJoins));
							if(!empty($tmpJournal['Wallet']['transactionID'])) {
								$tmpWallet['id'] = $tmpJournal['Wallet']['id'];
							} 
							$this->Wallet->data['Wallet'][] = $tmpWallet;
						}
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
				$this->suberror['CharacterWalletTransactions'] = $this->EveOnlineAp6039373270i->error;
			}
		}
		if(!empty($this->Wallet->data['Wallet'])) {
			if(!$this->Wallet->saveMany($this->Wallet->data['Wallet'])) {
				throw new InternalErrorException();
			}
		}
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
