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

App::uses('EveOnlineApiAppModel', 'EveOnlineApi.Model');
/**
 * MapRegionJump Model
 *
 */
class MapRegionJump extends EveOnlineApiAppModel {
/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'evedump';
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'mapRegionJumps';
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'fromRegionID';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'toRegionID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
