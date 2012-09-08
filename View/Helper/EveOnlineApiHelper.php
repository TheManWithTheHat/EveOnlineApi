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

class EveOnlineApiHelper extends Helper {

	var $path = '/EveOnlineApi/img/icons/items/';

	public function __construct(View $view, $settings = array()) {
		parent::__construct($view, $settings);
	}

	public function imageRace($race) {
		switch($race) {
			case 'Amarr':
				return $this->path .  '19_128_4.png';
			case 'Caldari':
				return $this->path . '19_128_1.png';
			case 'Gallente':
				return $this->path .  '19_128_3.png';
			case 'Minmatar':
				return $this->path .  '19_128_2.png';
		}
	}

	public function imageBloodline($bloodline) {
		switch($bloodline) {
			// Amarr Bloodlines
			case 'Amarr':
				return $this->path .  '28_128_1.png';
			case 'Ni-Kunni':
				return $this->path . '29_128_1.png';
			case 'Khanid':
				return $this->path . '59_128_3.png';
			// Caldari Bloodlines
			case 'Deteis':
				return $this->path . '29_128_2.png';
			case 'Civire':
				return $this->path . '28_128_4.png';
			case 'Achura':
				return $this->path . '59_128_2.png';
			// Gallente Bllodlines
			case 'Ethnic Gallente':
				return $this->path . '28_128_2.png';
			case 'Intaki':
				return $this->path . '28_128_3.png';
			case 'Jin-Mei':
				return $this->path . '59_128_4.png';
			// Minmatar Bloodlines
			case 'Sebiestor':
				return $this->path . '29_128_3.png';
			case 'Brutor':
				return $this->path . '29_128_4.png';
			case 'Vherokior':
				return $this->path . '59_128_1.png';
			// Jove Bloodlines
			case 'Static':
				return $this->path . '';
			case 'Modifier':
				return $this->path . '';
		}


	}

	public function imageAncestry($ancestry) {
		switch(ancestry) {
			case 'Merchandisers':
				return $this->path . '';
			case 'Scientists':
				return $this->path . '';
			case 'Tube Child':
				return $this->path . '';
			case 'Entrepreneurs':
				return $this->path . '';
			case 'Mercs':
				return $this->path . '';
			case 'Dissenters':
				return $this->path . '';
			case 'Inventors':
				return $this->path . '';
			case 'Monks':
				return $this->path . '';
			case 'Stargazers':
				return $this->path . '';
			case 'Tinkerers':
				return $this->path . '';
			case 'Traders':
				return $this->path . '';
			case 'Rebels':
				return $this->path . '';
			case 'Workers':
				return $this->path . '';
			case 'Tribal Traditionalists':
				return $this->path . '';
			case 'Slave Child':
				return $this->path . '';
			case 'Drifters':
				return $this->path . '';
			case 'Mystics':
				return $this->path . '';
			case 'Retailers':
				return $this->path . '';
			case 'Liberal Holders':
				return $this->path . '';
			case 'Wealthy Commoners':
				return $this->path . '';
			case 'Religious Reclaimers':
				return $this->path . '';
			case 'Free Merchants':
				return $this->path . '';
			case 'Border Runners':
				return $this->path . '';
			case 'Navy Veterans':
				return $this->path . '';
			case 'Cyber Knights':
				return $this->path . '';
			case 'Unionists':
				return $this->path . '';
			case 'Zealots':
				return $this->path . '';
			case 'Activists':
				return $this->path . '';
			case 'Miners':
				return $this->path . '';
			case 'Immigrants':
				return $this->path . '';
			case 'Artists':
				return $this->path . '';
			case 'Diplomats':
				return $this->path . '';
			case 'Reborn':
				return $this->path . '';
			case 'Sang Do Caste':
				return $this->path . '';
			case 'Saan Go Caste':
				return $this->path . '';
			case 'Jing Ko Caste':
				return $this->path . '';
			case 'Elders':
				return $this->path . '';
			case 'Unsullied':
				return $this->path . '';
			case 'Stasis People':
				return $this->path . '';
			case 'Existentialists':
				return $this->path . '';
			case 'Puritan':
				return $this->path . '';
			case 'Lab Rat':
				return $this->path . '';
		}
	}

}
