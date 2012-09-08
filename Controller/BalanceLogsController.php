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

App::uses('EveServiceAppController', 'EveService.Controller');

class BalanceLogsController extends EveOnlineApiAppController {
public $uses = array('EveOnlineApi.BalanceLog', 'EveOnlineApi.Account', 'EveOnlineApi.Balance');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->currentUser = $this->Auth->user();
		App::import('Model', 'EveOnlineApi.Balance');
		$this->User->Balance = new Balance();
		
	}

	public function index($corporationID = null) {
		App::import('Model', 'EveOnlineApi.Balance');
		$this->User->Balance = new Balance();

		$this->User->Balance->data = $this->User->Balance->find('all', array(
			'fields' => array('Balance.value', 'Balance.corporationID', 'Character.corporationID', 'Character.corporationName'),
			'conditions' => array('Balance.user_id' => $this->currentUser['User']['id']),
			'joins' => array( 
				array(
					'table' => 'characters',
					'alias' => 'Character',
					'type' => 'LEFT',
					'conditions' => array('Character.corporationID = Balance.corporationID')
			)),
			'order' => array('Character.corporationName' => 'asc'),
			'group' => 'Balance.id'
));
		$this->set('users_balances', Set::combine($this->User->Balance->data, '{n}.Character.corporationID', '{n}.Character.corporationName'));
		$this->paginate = array(
			'order' => array('BalanceLog.created' => 'desc'),
			'conditions' => array(	'Balance.corporationID' => $corporationID,
						'Balance.user_id' => $this->currentUser['User']['id']
					),
			'limit'=>100,
		);
		$this->set('balancelog', $this->paginate());
		$this->set('corporationID', $corporationID);

	}

	public function refund() {
		$this->User->Balance->data = $this->User->Balance->find('first', array(
			'fields' => array('Balance.id', 'Balance.value', 'Balance.corporationID'),
			'conditions' => array(	'Balance.user_id' => $this->currentUser['User']['id'],
						'Balance.corporationID' => null
			),
			'group' => 'Balance.id'
		));

		if(!empty($this->User->Balance->data['Balance']['value'])) {	
			$balance = $this->User->Balance->data['Balance']['value'];
			$this->BalanceLog->bindRefundValidation($balance);
			$this->set('balance', $balance);

			if ($this->request->is('post')) {
				$this->BalanceLog->create();
				$this->request->data['BalanceLog']['value'] = floatval($this->request->data['BalanceLog']['value']);
				$this->request->data['BalanceLog']['refund'] = 1;
				$this->request->data['BalanceLog']['eo_balance_id'] = $this->User->Balance->data['Balance']['id'];
				$this->request->data['BalanceLog']['subject'] = __d('EveOnlineApi', 'Guthaben Auszahlung auf ingame Konto von %s', $this->user_chars[$this->request->data['BalanceLog']['character_id']]);
				App::uses('Balance', 'Model');
				$this->Balance = new Balance();
				$this->Balance->id = $this->User->Balance->data['Balance']['id'];
				$this->Balance->data = $this->Balance->read();
				$data['Balance'] = $this->Balance->data['Balance'];
				$data['Balance']['value'] -= $this->request->data['BalanceLog']['value'];
				if ($this->Balance->save($data) && $this->BalanceLog->save($this->request->data)) {
					$this->Session->setFlash(__('%s gespeichert', __d('eve_online_api', __d('EveOnlineApi', 'Auszahlungsauftrag'))));
					$this->updateRights(true);
					$this->redirect(array('controller' => 'Accounts', 'action' => 'dashboard'));
				} else {
					$this->Session->setFlash(__('%s konnte nicht gespeichert werden',__d('eve_online_api', __d('EveService', 'Auszahlungsauftrag'))));
				}
			}
		} else {
			$this->Session->setFlash(__('Ein unbekannter Fehler ist aufgetreten'));
		}
	}
}
			
