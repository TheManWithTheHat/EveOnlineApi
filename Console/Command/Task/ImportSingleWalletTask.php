<?php
/**
 * @since	Created on 8 Aug 2012
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

App::uses('AppShell', 'Console/Command');
App::uses('ComponentCollection', 'Controller');
App::uses('EveOnlineApiComponent', 'EveOnlineApi.Controller/Component');
App::uses('EveCentralApiComponent', 'EveOnlineApi.Controller/Component');
App::uses('EveAccountUpdateComponent', 'EveOnlineApi.Controller/Component');


class ImportSingleWalletTask extends Shell {
	
	var $tasks = array('Project', 'DbConfig', 'Model', 'View', 'Controller');

	var $keyID = '';
	var $vCode = '';
	var $accountKey = 1000;
	var $corporationID = '';
	
	
	public function init() {
		$this->keyID = Configure::read('EveOnlineApi.balanceImport.keyID');
		$this->vCode = Configure::read('EveOnlineApi.balanceImport.vCode');
		$this->accountKey = Configure::read('EveOnlineApi.balanceImport.accountKey');
		$this->corporationID = Configure::read('EveOnlineApi.balanceImport.corporationID');
	}
	
	
	public function execute() {
		// Initializing
		$collection = new ComponentCollection();
		$this->EveOnlineApi = new EveOnlineApiComponent($collection);
		$this->EveCentralApi = new EveCentralApiComponent($collection);
		//$this->EveAccountUpdate = new EveAccountUpdateComponent($collection);
		
		$this->EveOnlineApi->init($this->keyID,$this->vCode);

		$params = array('rowCount' => 250, 'accountKey' => $this->accountKey);
		$walking = true;
		
		$last_transaction = null;
		$nextlast_transaction = $last_transaction;
		$limit = 250;
		$entries_found = 0;
		App::import('Model', 'EveOnlineApi.Wallet');
		App::import('Model', 'EveOnlineApi.BalanceLog');
		$this->Wallet = new Wallet();
		$this->BalanceLog = new BalanceLog();
		while ($walking) {
			$wallet = $this->EveOnlineApi->getCorporationWalletJournal($params);
			if($wallet) {
				$number_of_entries = count($this->EveOnlineApi->response['result']['rowset']['row']);
				if($number_of_entries < $params['rowCount']) {
					$walking = false;
				}
				if(!empty($this->EveOnlineApi->response['result']['rowset']['row'])) {
					foreach ($this->EveOnlineApi->response['result']['rowset']['row'] as $transaction) {
						debug($transaction);
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

								if($transaction['@ownerID1'] == $this->EveOnlineApi->characterID) {
									$tmpWallet['other_characterID'] = intval($transaction['@ownerID2']);
									$tmpWallet['other_characterName'] = (string) $transaction['@ownerName2'];
								} else {
									$tmpWallet['other_characterID'] = intval($transaction['@ownerID1']);
									$tmpWallet['other_characterName'] = (string) $transaction['@ownerName1'];
								}
								// Buyer and Seller are sharing the same transactionID. So we can't use the transactionID as primaryKey
								$tmpJournal = $this->Wallet->find('first', array('conditions' => array(
										'Wallet.characterID' => $this->corporationID,
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
								if($tmpWallet['refTypeID'] == 10) {
									// Player Donation

								}
							}
						}
					}
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
}