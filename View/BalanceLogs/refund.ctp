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
<?php echo $this->Form->create('BalanceLog');?>
	<fieldset>
		<div style="border:1px #000 solid; padding:10px; margin-bottom:10px;">
			<h1><?php echo __d('EveService', 'Hinweis zur Auszahlung von Guthaben'); ?></h1>
			<?php echo __d('EveService', 'Die Auszahlung des Guthabens auf Ihr Eve Online Ingame Konto ist kostenfrei und kann bis zu 48 Stunden dauern, da diese nicht automatisiert möglich ist.'); ?>
		</div><?php
		echo $this->Form->input('value', array('label' => __('Betrag'), 'after' => __d('EveService', 'Maximaler Auszahlungsbetrag: %s ISK', mf($balance))));
		echo $this->Form->input('character_id', array('options' => $user_chars, 'label' => __d('EveOnlineApi', 'Charakter')));
		?>
	</fieldset>
<?php
echo $this->Form->end(__('Abschicken')); ?>
</div>
