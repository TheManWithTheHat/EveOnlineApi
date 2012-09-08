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
<?php echo $this->Form->create('Account');?>
	<fieldset>
		<legend><?php echo $title; ?></legend>
		<?php
		echo $this->Form->input('keyID', array('type' => 'number', 'label' => __('Key ID')));
		echo $this->Form->input('vCode',array('label'=>__('Verification Code')));
		echo $this->Form->input('fullCharacterData', array('type' => 'checkbox', 'label' => __d('EveService', 'vollständige Charakterdaten direkt einlesen? (Dies erhöht die Ladezeit)')));
if(!empty($this->request->data)) {
		echo $this->Form->input('accessMask',array('readonly' => true, 'label'=>__('AccessMask')));
		echo $this->Form->input('type',array('readonly' => true, 'label'=>__('Type')));
		echo $this->Form->input('expires',array('readonly' => true, 'label'=>__('Gültig bis')));
		}
		?>
	</fieldset>
<?php
echo __d('EveOnlineApi', 'Ein Limited API-Key mit den öffentlich zugänglichen Informationen ist ausreichend');
echo $this->Form->end(__('Hinzufügen')); ?>
</div>
<?php
	echo __d('EveOnlineApi', 'Um einen API-Key zu erzeugen, besuche bitte das EVE Online %s', $this->Html->link('API key management', 'https://support.eveonline.com/Pages/Login.aspx?ReturnUrl=%2fapi', array('target' => '_blank')));


