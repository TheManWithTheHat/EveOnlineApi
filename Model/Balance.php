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

App::uses('AppModel', 'Model');

class Balance extends EveOnlineApiAppModel {
/**
 * Validation rules
 *
 * @var array
 */

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function add($value, $message, $user_id, $corporationID = null) {
		if(empty($this->data)) {
			$this->data = $this->findByUserId($user_id);
			if(empty($this->data['Balance']['value'])) {
				$this->data['Balance']['value'] = 0;
			} else {
				$this->id = $this->data['Balance']['id'];
			}
		}
		$savedata = array();
		$savedata['Balance'] = array(
			'id' => $this->id,
			'user_id' => $user_id,
			'corporationID' => $corporationID,
			'value' => floatval($this->data['Balance']['value'] + $value)
		);
		$return = $this->save($savedata);
		$savedata['BalanceLog'] = array(
			'value' => floatval($value),
			'eo_balance_id' => $this->id,
			'subject' => $message
		);
		App::import('Model', 'EveService.BalanceLog');
		$tmp->BalanceLog = new BalanceLog();
		$tmp->BalanceLog->save($savedata);
		return $return;
	}


	public function reduce($value, $message) {
		$savedata = array();
		$savedata['BalanceLog'] = array(
			'value' => floatval(-1 *$value),
			'eo_balance_id' => $this->id,
			'subject' => $message
		);
		App::import('Model', 'EveOnlineApi.BalanceLog');
		$tmp->BalanceLog = new BalanceLog();
		$tmp->BalanceLog->save($savedata);
		$savedata['Balance'] = array(
			'id' => $this->id,
			'value' => floatval($this->data['Balance']['value'] - $value)
		);
		return $this->save($savedata);
	}
}
