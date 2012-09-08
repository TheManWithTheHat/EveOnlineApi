<?php
/**
 * @since	Created on 30 Jul 2012
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

class InvTypesController extends EveOnlineApiAppController {

	public function search($group_categories = array()) {
		if($this->request->isAjax()) {
			$inv_types = null;
			if(!empty($_GET['term'])){
				$s = urldecode($_GET['term']);
				$conditions = array();
				if(!empty($group_categories)) {
					$conditions['InvGroup.categoryID'] = explode(",", $group_categories);
				}
				$inv_types = $this->InvType->find('all',array(
						'fields' => '*',
						'joins' => array(
								array(	'table' => 'invGroups',
										'alias' => 'InvGroup',
										'conditions' => array('InvType.groupID = InvGroup.groupID'),
										'type' => 'inner'
								)
						),
						'conditions'=>array_merge($conditions, array(	'InvType.typeName LIKE'=>'%' . $s . '%'	)),
						'limit'=>25,
				));
			}
			$this->set(compact('inv_types'));
		} else {
			throw new ForbiddenException();
		}
	}
}