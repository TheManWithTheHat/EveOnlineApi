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

?>
<div class="actions">
	<h2><?php echo __('Aktionen'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__d('EveOnlineApi', 'Dashboard'), array('plugin' => 'eve_online_api', 'controller'=> 'accounts', 'action' => 'dashboard')); ?></li>		
		<br/>
		<li><?php echo $this->Html->link(__d('EveOnlineApi', 'Account Verwaltung'), array('plugin' => 'eve_online_api', 'controller'=> 'accounts', 'action' => 'index')); ?></li>		
		<li><?php echo $this->Html->link(__('%s hinzufügen', __d('EveOnlineApi', 'EVE Account')), array('plugin' => 'eve_online_api', 'controller'=> 'accounts', 'action' => 'add')); ?></li>
		<br/>
		<li><?php echo $this->Html->link(__d('EveOnlineApi', 'Kontoauszug'), array('plugin' => 'eve_online_api', 'controller'=> 'balance_logs', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__d('EveOnlineApi', 'Guthaben auszahlen'), array('plugin' => 'eve_online_api', 'controller'=> 'balance_logs', 'action' => 'refund')); ?></li>
	</ul>
</div>
