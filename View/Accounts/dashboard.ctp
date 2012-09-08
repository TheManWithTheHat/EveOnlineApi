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
<?php
	if(!empty($characters)) {
		foreach($characters as $character) {
			?>
			<div style="float:left; border:1px #000 solid; margin:10px;">
				<table class="nohighlight">
					<tbody>
						<tr>
							<td rowspan="11">
								<?php echo $this->Html->image('https://image.eveonline.com/Character/' . $character['Character']['characterID']. '_128.jpg'); ?>
								<div class="charbox_race-images">
									<?php
										echo $this->Html->image(
											$this->EveOnlineApi->imageRace($character['Character']['race']), 
											array('alt' => $character['Character']['race'], 'title' => $character['Character']['race'], 'width' => 64, 'height' => 64
										));
										echo $this->Html->image(
											$this->EveOnlineApi->imageBloodline($character['Character']['bloodLine']), 
											array('alt' => $character['Character']['bloodLine'], 'title' => $character['Character']['bloodLine'], 'width' => 64, 'height' => 64
										));
									?>
								</div>
								<div class="charbox_corp-images">
									<?php
										echo $this->Html->image('https://image.eveonline.com/Corporation/' . $character['Character']['corporationID']. '_64.png',
											array('title' => $character['Character']['corporationName'], 'alt' => $character['Character']['corporationName'], 'width' => 64, 'height' => 64));
										if($character['Character']['allianceID'] > 0) {
											echo $this->Html->image('https://image.eveonline.com/Alliance/' . $character['Character']['allianceID']. '_64.png',
												array('title' => $character['Character']['allianceName'], 'alt' => $character['Character']['allianceName'], 'width' => 64, 'height' => 64));
										}
									?>
								</div>
								<div class="charbox_attributes">
								</div>
								<div class="charbox_cached" style="text-align:center; vertical-align:middle;"><br/>
									<?php
										echo $this->Html->link(__d('EveOnlineApi', 'Update'), array('plugin' => 'eve_online_api', 'controller' => 'accounts', 'action' => 'update', $character['Character']['characterID'])); 
									?>
								</div>
							</td>

							<td><?php echo __('Name') .':'; ?></td><td><strong><?php echo $character['Character']['characterName']; ?></strong></td></tr>
						<tr><td><?php echo __d('EveService', 'Corp') .':'; ?></td><td><strong><?php echo $character['Character']['corporationName']; ?></strong></td></tr>
						<tr><td><?php echo $this->Html->link(__d('EveService', 'Kontostand'), array('plugin' => 'eve_service', 'controller' => 'wallets', 'action' => 'index', 'characterID' => $character['Character']['characterID'])) .':'; ?></td><td><?php  echo mf($character['Character']['balance'])?> ISK</td></tr>
						<tr><td><?php echo __d('EveService', 'Ort') .':'; ?></td><td><?php  ?></td></tr>
						<tr><td><?php echo __d('EveService', 'Assets') .':'; ?></td><td><?php   ?></td></tr>
						<tr><td><?php echo __d('EveService', 'Industrie') .':'; ?></td><td><?php   ?></td></tr>
						<tr><td><?php echo __d('EveService', 'Skill Anzahl') .':'; ?></td><td><?php  echo sprintf('%s (%s | %s | %s | %s | %s)',	
								$character['Character']['skills'], $character['Character']['lvl1skills'], $character['Character']['lvl2skills'],
								$character['Character']['lvl3skills'], $character['Character']['lvl4skills'],$character['Character']['lvl5skills']); ?></td></tr>
						<tr><td><?php echo __d('EveService', 'Skillpunkte') .':'; ?></td><td><?php 
							if($character['Character']['skillpoints'] > $character['Character']['cloneSkillPoints']) {
								echo '<span style="color:#ff0000;" title="'.__d('EveOnlineService', 'Der Clon ist nur für bis zu %s Skillpunkte abgesichert', number_format($character['Character']['cloneSkillPoints'],0,'', '.')).'" alt="'.__d('EveOnlineService', 'Der Clon ist nur für bis zu %s Skillpunkte abgesichert', number_format($character['Character']['cloneSkillPoints'],0,'', '.')).'">';
								echo number_format($character['Character']['skillpoints'],0,'', '.');
								echo '</span>';
							} else {
								echo number_format($character['Character']['skillpoints'],0,'', '.');
							}
						  ?></td></tr>
						<tr><td><?php echo __d('EveService', 'Aktueller Skill') .':'; ?></td><td><?php   ?></td></tr>
						<tr><td><?php echo __d('EveService', 'Queue Ende') .':'; ?></td><td><?php  ?></td></tr>
					</tbody>
				</table>
			</div>

			<?php

		}
	}

?>
<span style="clear:both"></span>
</div>