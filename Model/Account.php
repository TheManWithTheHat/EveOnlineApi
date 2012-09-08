<?php
/**
 * @since	Created on 29 Jun 2012
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

class Account extends EveOnlineApiAppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'keyID' => array(
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
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Dieser Key wird bereits verwendet',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'vCode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Pflichtfeld',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Ungültige Zeichen',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength', 64),
				'message' => '64 Zeichen erwartet',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength', 64),
				'message' => '64 Zeichen erwartet',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Dieser Key wird bereits verwendet',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'accessMask' => array(
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
/*
			'multiple' => array(
				'rule' => array('checkAccessMask'),
				'message' => 'Unzuässige AccessMask (Mindestanforderung: 93194506)',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
*/
		),
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Pflichtfeld',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'type' => array(
				'rule' => array('multiple', array('in' => array('Account', 'Corporation'))),
				'message' => 'Accountweiter oder Corporation API Key erwartet',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'expires' => array(
			'equalTo' => array(
				'rule' => array('equalTo', ''),
				'message' => 'API-Key ohne Ablaufdatum erwartet',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),


	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Character' => array(
			'className' => 'EveOnlineApi.Character',
			'foreignKey' => 'account_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'Character.DoB'
		)
	);

	public function checkAccessMask($check) {
		App::import('Component', 'EveOnlineApi', 'EveOnlineApi');
		$collection = new ComponentCollection();
		$this->EveOnlineApi = new EveOnlineApiComponent($collection);
		if($check['accessMask'] == 268435455) {
			//Full API Access
			return true;
		} else {
			//TODO Configuration file etc.
			if($this->data['Account']['type'] == 'Corporation') {
				return true;	
			} else {
				return $this->EveOnlineApi->validateAccessMask($check['accessMask'], $names = array('CharacterInfo'));
			}
		}
	}
}
