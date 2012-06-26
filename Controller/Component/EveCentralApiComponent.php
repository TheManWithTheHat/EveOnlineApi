<?php
/**
 * @since	Created on 26 Jun 2012
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

class EveCentralApiComponent extends Component {

	public $urls = array(	'marketstat' => 'http://api.eve-central.com/api/marketstat',
				'quicklook' => 'http://eve-central.com/api/quicklook',
				'quicklookpath' => 'http://eve-central.com/api/quicklook/onpath',
				'evemon' => 'http://api.eve-central.com/api/evemon',
				'route' => 'http://api.eve-central.com/api/route/from/'
	);

	private function _request($host, $params = null) {
		$full_path = $host . '?';

		if(is_array($params)) {
			foreach($params as $key => $value) {
				if(is_array($value)) {
					// typeid can be submitted multiple times
					foreach($value as $v) {
						$full_path .= '&' . $key . '=' . $v;
					}
				} else {
					$full_path .= '&' . $key . '=' . $value;
				}
			}
		}
		$date = date('D, d M Y G:i:s T',time());
 		$header = array("Host: api.eve-central.com", "User-Agent: EveOnlineApi Plugin for cakePHP");

		$fails = 0; 		
 		while($fails < 5 || !empty($response)) {
	 		$ch = curl_init($full_path);
	 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	 		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	 		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	 		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	 		curl_setopt($ch, CURLOPT_VERBOSE, true);
	 		
	 		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	 		$response = curl_exec($ch);
	 		$headers = curl_getinfo($ch);
	 		if(empty($response)) {
	 			$fails++;
	 			sleep (3);
	 		} else {
	 			break;
	 		}
 		}
		if(empty($response)) {
			$this->error = 404;
			$this->errormessage = __d('EveOnlineApi', 'Keine Antwort vom API Server');
			return false;
		} else {
			try {
				$xml = Xml::toArray(Xml::build($response));
				$this->response = $xml['evec_api'];
				if(false) {
					//TODO Error Handling
				} else {
					$this->error		= 0;
					$this->errormessage	= __d('EveOnlineApi', 'fly save');
					return true;
				}	
			} catch(XmlException $e) {
				throw new InternalErrorException();
			}
		}
	}

	/*
         * Public functions
         */


	/*
         * marketstat
	 * http://dev.eve-central.com/evec-api/start
         */

	public function marketstat($params) {
		return $this->_request($this->urls['marketstat'], $params);
	}

	/*
         * quicklook
	 * http://dev.eve-central.com/evec-api/start
         */

	public function quicklook($params) {
		return $this->_request($this->urls['quicklook'], $params);
	}

	/*
         * quickloo kpath
	 * http://dev.eve-central.com/evec-api/start
         */

	public function quicklookpath($xxx, $yyy, $zzz, $params) {
		return $this->_request($this->urls['quicklookpath'] .'/from/' . $xxx . '/to/' . $yyy . '/fortype/' . $zzz, $params);
	}

	/*
         * evemon
	 * http://dev.eve-central.com/evec-api/start
         */

	public function evemon() {
		return $this->_request($this->urls['evemon']);
	}

	/*
         * route
	 * http://dev.eve-central.com/evec-api/start
         */

	public function route($xxx, $yyy) {
		return $this->_request($this->urls['route'] . $xxx .'/to/' . $yyy);
	}




}

