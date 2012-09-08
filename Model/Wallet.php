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

class Wallet extends EveOnlineApiAppModel {
	
	public $defaultOrder = array('Wallet.created' => 'desc', 'Wallet.transactionID' => 'desc');

	public $cacheQueries = true;
	
	public $virtualFields = array(
		'isTaxFree' => 'CASE WHEN Account2.user_id = Account.user_id OR Wallet.taxfree = 1 THEN 1 ELSE 0 END'
	);

	public $defaultJoins = array(
		array(	'table' => 'characters',
			'alias' => 'Character',
			'type' => 'inner',
			'conditions' => array('Character.characterID = Wallet.characterID'
			)
		),
		array(
			'table' => 'characters',
			'alias' => 'Character2',
			'type' => 'left',
			'conditions' => array('Character2.characterID = Wallet.other_characterID')
		),
		array(
			'table' => 'accounts',
			'alias' => 'Account',
			'type' => 'inner',
			'conditions' => array('Account.id = Character.account_id')
		),
		array(
			'table' => 'accounts',
			'alias' => 'Account2',
			'type' => 'left',
			'conditions' => array('Account2.id = Character2.account_id')
		)
	);

	// Defining RefTypeIDs which are suitable for taxing
	public $refTypeIDs_taxable = array(1, 2, 10, 17, 35, 38, 68);


	// Defining RefTypeIDs which are reducing the tax
	public $refTypeIDs_reduceTax = array(46, 54, 56, 57 ,58, 59, 60, 61, 62, 72, 73, 75, 96, 97);

	public function calculateCorpTaxes($user_id, $tax_rate, $additionalConditions = array()) {
		$querystring = 'CASE WHEN Wallet.taxAmount = 0 AND (Wallet.amount > 0 OR Wallet.taxreduce = 1 OR Wallet.refTypeID IN (' . implode(',', $this->refTypeIDs_reduceTax) . ')) THEN Wallet.amount ELSE 0 END';
		$result = $this->find('all', array(
			'fields' => array(
				'SUM(' . $querystring . ') AS `sumTaxable`',
				'SUM(' . $querystring . ' / 100 * ' . $tax_rate . ') AS `sumToPay`'
			),
			'order' => $this->defaultOrder,
			'conditions' => array_merge(
				$additionalConditions, 
				array(
					'Account.user_id' => $user_id,
					'Wallet.isTaxFree' => 0,
					'OR' => array(
						'Wallet.transactionID > Character.lastTaxTransactionID',
						'Character.lastTaxTransactionID' => null
					),
					'Wallet.refTypeID' => array_merge($this->refTypeIDs_taxable, $this->refTypeIDs_reduceTax)
				)
			),
			'joins' => $this->defaultJoins
		));
		if(!empty($result[0][0])) {
			return array_merge($result[0][0], array('tax_rate' => $tax_rate));
		} else {
			return array(
				'sumTaxable' => 0,
				'sumToPay' => 0,
				'tax_rate' => $tax_rate
			);
		}
	}

	public function calculateRevenues($user_id, $additionalConditions = array()) {
		$result = $this->find('all', array(
			'fields' => array(
				'SUM(CASE WHEN Wallet.refTypeID IN (2) THEN Wallet.amount ELSE 0 END) AS `sumMarketTransaction`',
				'SUM(CASE WHEN Wallet.refTypeID IN (7, 21, 33, 34) THEN Wallet.amount ELSE 0 END) AS `sumMissionReward`',
				'SUM(CASE WHEN Wallet.refTypeID IN (10) AND Wallet.taxfree = 0 AND Account2.user_id != Account.user_id THEN Wallet.amount ELSE 0 END) AS `sumPlayerDonation`',
				'SUM(CASE WHEN Wallet.refTypeID IN (16, 17, 85) THEN Wallet.amount ELSE 0 END) AS `sumBounty`',
				'SUM(CASE WHEN Wallet.refTypeID IN (68) THEN Wallet.amount ELSE 0 END) AS `sumContractReward`',
				'SUM(CASE WHEN Wallet.refTypeID IN (37) THEN Wallet.amount ELSE 0 END) AS `sumCorporationAccountWithdrawal`',
				'SUM(CASE WHEN Wallet.refTypeID IN (38) THEN Wallet.amount ELSE 0 END) AS `sumCorporationDividendPayment`'
			),
			'order' => $this->defaultOrder,
			'conditions' => array_merge(
				$additionalConditions, 
				array(
					'Account.user_id' => $user_id,
					'Wallet.amount > 0'
				)
			),
			'joins' => $this->defaultJoins
		));
		if(!empty($result[0][0])) {
			$return = $result[0][0];
		} else {
			$return = array(	'sumMarketTransaction' => 0,
						'sumMissionReward' => 0,
						'sumPlayerDonation' => 0,
						'sumBounty' => 0,
						'sumContractReward' => 0,
						'sumCorporationAccountWithdrawal' => 0,
						'sumCorporationDividendPayment' => 0
			);
		}
		return __arrayPercentage($return);
	}
	
}

function __arrayPercentage($array) {
	$new = array();
	$sum = array_sum($array);
	if(empty($array)) {
		return false;
	} else {
		foreach($array as $key => $value) {
			if($sum == 0) {
				$new[$key] = 0;
			} else if($sum == floor($value)) {
				$new[$key] = 100;
			} else {
				$new[$key] = floor((100 / $sum) * $value);
			}
		}
	}
	return $new;
}

