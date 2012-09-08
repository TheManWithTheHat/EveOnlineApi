<?php
/**
 * @since	Created on 10 Aug 2012
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

App::uses('EveOnlineApiAppController', 'EveOnlineApi.Controller');

class AccountsController extends EveOnlineApiAppController {
	public $uses = array('EveOnlineApi.Account');
	
	public function index() {
		$this->paginate = array(
				'fields' => array('Account.*'),
				'conditions' => array('Account.user_id' => $this->currentUser['User']['id']),
				'limit'=>50,
				'group' => 'Account.id',
				'page' => 1
		);
		$this->set('accounts', $this->paginate());
	}
	
	public function dashboard() {
		$this->Account->Character->unbindModel(array('hasMany' => array('EoSkill', 'EoCertificate')));
/*
		$this->User->EoBalance->data = $this->User->EoBalance->find('first', array(
			'fields' => array('EoBalance.value'),
			'conditions' => array(	'EoBalance.user_id' => $this->currentUser['User']['id'],
						'EoBalance.corporationID' => null
			)
		));
*/
		if(!empty($this->User->EoBalance->data)) {
			$balance = $this->User->EoBalance->data['EoBalance']['value'];
		} else {
			$balance = 0;
		}
		$this->set('users_balance', $balance);
		$this->set('characters', $this->Account->Character->data);
	}

	public function update($characterID) {
		if(empty($characterID) || !is_numeric($characterID)) {
			throw new NotFoundException();
		} else if(!array_key_exists($characterID, $this->user_chars)) {
			throw new ForbiddenException();
		} else {
			$a = Set::extract('/Character[characterID='.$characterID.']', $this->Account->Character->data);
			if(!empty($a[0]['Character']['account_id'])) {
				$result = $this->EveAccountUpdate->update($this->currentUser['User']['id'], $a[0]['Character']['account_id']);
				if(is_numeric($result)) {
					// Error Handling
					$this->Session->setFlash(__d('EveOnlineApi', $this->EveOnlineApi->errorcodes[$result]));
				} else {
					$this->Session->setFlash(__d('EveOnlineApi', 'Account aktualisiert'));
					$this->redirect(array('action' => 'dashboard'));
				}
			} else {
				throw new InternalErrorException();	
			}
		}
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Account->create();
			$this->request->data['Account']['user_id'] = $this->currentUser['User']['id'];

			if(!empty($this->request->data['Account']['keyID']) && is_numeric($this->request->data['Account']['keyID']) && !empty($this->request->data['Account']['vCode'])) {
				$result = $this->EveAccountUpdate->update(
					$this->currentUser['User']['id'], null, 
					$this->request->data['Account']['keyID'], 
					$this->request->data['Account']['vCode'], 
					array(	'disabledCharacterImport' => !$this->request->data['Account']['fullCharacterData'], 
							'skillsInSameTable' => true, 
							'combineTransactions' => true
				));
				if(is_numeric($result)) {
					// Error Handling
					$this->Session->setFlash(__d('EveOnlineApi', $this->EveOnlineApi->errorcodes[$result]));
				} else if(is_object($result)) {
					$this->Account->validationErrors = $result->validationErrors;
				} else {
					//TODO History User <> Character <> Corporation
					//TODO Wallet
					$this->Session->setFlash(__('%s gespeichert', __d('eve_online_api', 'Account')));
					$this->updateRights(true);
					$this->redirect(array('action' => 'dashboard'));
				}
			}
		}

		if(!empty($this->data)) {
			$data = $this->data;
			$data['Account']['user_id'] = $this->currentUser['User']['id'];
		}
	}

}
