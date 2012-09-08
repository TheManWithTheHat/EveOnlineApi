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
	<?php echo $this->Form->create('BalanceLog');
		$url = $this->Html->url(array('controller'=>'BalanceLogs','action'=>'view'));
		echo $this->Form->input('corporationID', array('value' => $corporationID, 'onChange' => 'goTo(\'' . $url . '/\' + $(\'#BalanceLogCorporationID\').val())', 'options' => $users_balances, 'type' => 'select','label' => __('Konto')));
		if($corporationID) {
			?><div style="border:1px #000 solid; padding:10px; margin-bottom:10px;">
				<h1><?php echo __d('EveService', 'Hinweis zum Corporation Guthaben'); ?></h1>
				<?php echo __d('EveService', 'Bei diesem Guthaben handelt es sich um ein Buchungskonto Ihrer Corporation für interne Verrechnungen mit Ihrer Person. Dieses Guthaben muss nicht unbedingt durch die Finanzen der Corporation gedeckt sein. <em>Mara Alba LLC</em> übernimmt keine Verantwortung für die Buchführung dieser Konten und tritt nicht in Ersatz, wenn Auszahlungen des hier gelisteten Guthabens nicht möglich sind.'); ?>
			</div><?php
		}
	?>
	<?php echo $this->element('paginator');?>
	<table>
		<thead>
			<th><?php echo __('Datum'); ?></th>
			<th>&nbsp;</th>
			<th><?php echo __('Verwendungszweck'); ?></th>
			<th><?php echo __('Wert'); ?></th>
		</thead>
		<tbody>
			<?php
				if(!empty($balancelog)) {
					foreach($balancelog as $bl) {
						?><tr>
							<td><?php echo date('d.m.Y H:i:s',  strtotime($bl['BalanceLog']['created'])); ?></td>
							<td style="color:#f00"><?php if($bl['BalanceLog']['refund']) { echo __d('EveService', 'ausstehend'); } ?>
							</td>
							<td><?php echo $bl['BalanceLog']['subject']; ?></td>
							<td style="text-align:right"><?php 
								if($bl['BalanceLog']['refund']) {
									echo mf(-1 * $bl['BalanceLog']['value']);
								} else {
									echo mf($bl['BalanceLog']['value']);
								}
							 ?> ISK
							</td>

						</tr><?php
					}
				} else {
					?><tr><td colspan="4"><?php echo __('keine Einträge vorhanden'); ?></td></tr><?php
				}
			?>
		</tbody>
	</table>
	<?php echo $this->element('paginator');?>
<span style="clear:both"></span>
</div>
