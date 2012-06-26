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

App::uses('EveOnlineApiAppController', 'EveOnlineApi.Controller');

class TestsController extends EveOnlineApiAppController {

/*
 * Controller for testing, without model
 */

	var $uses = null;

	public function test() {
		//Demo Limited API Key from Mara Alba
		$this->EveOnlineApi->init(1071702, 'UwNvjipU9uFEElSSgOOiXQM7aQX9XIm8SKj36NUs7gKvciu6mjcSvWYuUJJ97n5k', 92146869);

		$accessMask = $this->EveOnlineApi->validateAccessMask(8921408, array('CharacterInfo'));

		$result = $this->EveOnlineApi->getCharacterInfo();
		if($result) {
			debug($this->EveOnlineApi->response);
		} else {
			debug($this->EveOnlineApi->errormessage);
		}

		$result2 = $this->EveCentralApi->marketstat(array(
			'typeid' => array(34,35),
			'reionlimit' =>10000002 
		));
		if($result2) {
			debug($this->EveCentralApi->response);
		} else {
			debug($this->EveCentralApi->errormessage);
		}


	}

}
