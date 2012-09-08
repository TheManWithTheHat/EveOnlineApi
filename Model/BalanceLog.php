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

class BalanceLog extends EveOnlineApiAppModel {
/**
 * Validation rules
 *
 * @var array
 */

	public $belongsTo = array(
		'Balance' => array(
			'className' => 'EveOnlineApi.Balance',
			'foreignKey' => 'balance_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public function bindRefundValidation($balance) {
		$this->validate = array(
			'character_id' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Pflichtfeld',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				)
			),
			'value' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'Pflichtfeld',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'numeric' => array(
					'rule' => array('numeric'),
					'message' => 'Nur Ziffern gestattet',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'balance' => array(
					'rule' => array('comparison', '<=', $balance),
					'message' => __d('EveService', 'Kontostand nicht ausreichend')
				),
				'greater' => array(
					'rule' => array('comparison', '>', 0),
					'message' => __d('EveService', 'Positiver Wert größer Null erwartet')
				)
		));
	}
}
