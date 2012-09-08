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
<div class="users form">
	<?php echo $this->Session->flash('auth'); ?>
	<table>
		<thead>
			<th><?php echo __d('EveOnlineApi', 'Key ID'); ?></th>
			<th><?php echo __d('EveOnlineApi', 'Type'); ?></th>
			<th><?php echo __d('EveOnlineApi', 'Access Mask'); ?></th>
			<th class="actions"><?php echo __('Aktionen'); ?></th>
		</thead>
		<tbody>
			<?php
				if(!empty($accounts)) {
					foreach($accounts as $account) {
						?>
						<tr>
							<td><?php echo $account['Account']['keyID']; ?></td>
							<td><?php echo $account['Account']['type']; ?></td>
							<td><?php 
								echo $account['Account']['accessMask']; 
							?></td>
							<td class="actions"><?php echo $this->Html->link(__('Löschen'), array('action'=> 'delete', $account['Account']['id']), null, __('Möchten Sie diesen Account wirklich löschen?')); ?>
						</tr>
						<?php
					}
				}
			?>
		</tbody>
	</table>
</div>
