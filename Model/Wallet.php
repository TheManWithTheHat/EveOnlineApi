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
	
	public $primaryKey = 'transactionID';

	public $defaultOrder = array('Wallet.created' => 'desc', 'Wallet.transactionID' => 'desc');

	public $defaultJoins = array(
		array(	'table' => 'characters',
			'alias' => 'Character',
			'type' => 'left',
			'conditions' => array('Character.characterID = Wallet.characterID'
			)
		),
		array(
			'table' => 'accounts',
			'alias' => 'Account',
			'type' => 'left',
			'conditions' => array('Account.id = Character.account_id')
		)
	);
	
}

