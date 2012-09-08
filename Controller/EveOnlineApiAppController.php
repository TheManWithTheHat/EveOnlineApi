<?php
/**
 * @since	Created on 24 Jun 2012
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

setlocale(LC_MONETARY, 'de_DE.UTF-8');
if (!function_exists('mf')) {
	function mf($value) {
		if (round($value, 2) == 0) {
			$value = 0;
		}

		if($value < 0) {
			return '<span style="color:#f00">' . money_format('%!i', round($value, 2)) . '</span>';
		} else {
			return '<span style="color:green">' . money_format('%!i', round($value, 2)) . '</span>';
		}
	}
}

class EveOnlineApiAppController extends AppController {

	public $helpers = array(
			'EveOnlineApi.EveOnlineApi'
	);
	
	public $components = array(
			'EveOnlineApi.EveOnlineApi',
			'EveOnlineApi.EveCentralApi',
			'EveOnlineApi.EveAccountUpdate'
	);

	public $fieldsByView = array(
			'default' => array('Character.account_id',
					'Character.characterID', 'Character.characterName',
					'Character.corporationID', 'Character.corporationName',
					'Character.allianceID', 'Character.allianceName',
					'Character.cachedUntil'
			),
			'Accounts.dashboard' => array(
					'Character.race', 'Character.bloodLine', 'Character.ancestry', 'Character.gender',
					'Character.cloneName', 'Character.cloneSkillPoints',
					'Character.balance',
					//			'Character.intelligence', 'Character.intelligenceAugmentatorValue',
	//			'Character.memory', 'Character.memoryAugmentatorValue',
	//			'Character.charisma', 'Character.charismaAugmentatorValue',
	//			'Character.perception', 'Character.perceptionAugmentatorValue',
	//			'Character.willpower', 'Character.willpowerAugmentatorValue',
					'Character.skills', 'Character.skillpoints', 'Character.certificates',
					'Character.lvl1skills', 'Character.lvl2skills', 'Character.lvl3skills', 'Character.lvl4skills', 'Character.lvl5skills',
			),
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->user_chars = null;
		if(!empty($this->currentUser)) {
			$this->Account->Character->data = $this->Account->Character->find('all', array(
				'conditions' => array('Account.id = Character.account_id'),
				'fields' => array_merge($this->fieldsByView['default'], 
					isset($this->fieldsByView[$this->name.'.'.$this->view]) ? $this->fieldsByView[$this->name.'.'.$this->view] : array(),
					array('Account.*', 'Balance.value', 'Balance.id')	
				),
				'joins' => array(
						array(
							'table' => 'accounts',
							'alias' => 'Account',
							'type' => 'LEFT',
							'conditions' => array (
								'Account.user_id'=>$this->currentUser['User']['id']
							)
						),
						array(
							'table' => 'balances',
							'alias' => 'Balance',
							'type' => 'LEFT',
							'conditions' => array(
								'Balance.user_id = Account.user_id',
							)
						)
				),
				'group' => array('Character.characterID'),
				'order' => array('Account.createDate ASC', 'Character.DoB ASC'),
			));
			$this->user_chars = Set::combine($this->Account->Character->data, '{n}.Character.characterID', '{n}.Character.characterName');
			$this->user_accounts = Set::combine($this->Account->Character->data, '{n}.Account.id', '{n}.Account');
		}
		$this->set('user_accounts', $this->user_accounts);
		$this->set('user_chars', $this->user_chars);
		$this->set('currentUser', $this->currentUser);
	}

}

