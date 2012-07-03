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

class EveOnlineApiComponent extends Component {

	public $characterID = 92146869;			// Limited Api Key from Mara Alba for Testing
	public $keyID = 1071702;
	public $vCode = 'UwNvjipU9uFEElSSgOOiXQM7aQX9XIm8SKj36NUs7gKvciu6mjcSvWYuUJJ97n5k';

	public $urls = array(	'APIKeyInfo' => 'https://api.eveonline.com/account/APIKeyInfo.xml.aspx',
			'AccountStatus' => 'https://api.eveonline.com/account/AccountStatus.xml.aspx',
			'AccountCharacters' => 'https://api.eveonline.com/account/Characters.xml.aspx',
			'CharacterAccountBalance' => 'https://api.eveonline.com/char/AccountBalance.xml.aspx',
			'CharacterAssetList' => 'https://api.eveonline.com/char/AssetList.xml.aspx',
			'CharacterCalendarEventAttendees' => 'https://api.eveonline.com/char/CalendarEventAttendees.xml.aspx',
			'CharacterSheet' => 'https://api.eveonline.com/char/CharacterSheet.xml.aspx',
			'CharacterContactList' => 'https://api.eveonline.com/char/ContactList.xml.aspx',
			'ContactNotifications' => 'https://api.eveonline.com/char/ContactNotifications.xml.aspx',
			'CharacterFacWarStats' => 'https://api.eveonline.com/char/FacWarStats.xml.aspx',
			'CharacterIndustryJobs' => 'https://api.eveonline.com/char/IndustryJobs.xml.aspx',
			'CharacterKillLog' => 'https://api.eveonline.com/char/KillLog.xml.aspx',
			'CharacterMailinglists' => 'https://api.eveonline.com/char/mailinglists.xml.aspx',
			'CharacterMailBodies' => 'https://api.eveonline.com/char/MailBodies.xml.aspx',
			'CharacterMailMessages' => 'https://api.eveonline.com/char/MailMessages.xml.aspx',
			'CharacterMarketOrders' => 'https://api.eveonline.com/char/MarketOrders.xml.aspx',
			'CharacterMedals' => 'https://api.eveonline.com/char/Medals.xml.aspx',
			'CharacterNotificationTexts' => 'https://api.eveonline.com/char/NotificationTexts.xml.aspx',
			'CharacterNotifications' => 'https://api.eveonline.com/char/Notifications.xml.aspx',
			'CharacterStandings' => 'https://api.eveonline.com/char/Standings.xml.aspx',
			'CharacterResearch' => 'https://api.eveonline.com/char/Research.xml.aspx',
			'CharacterSkillInTraining' => 'https://api.eveonline.com/char/SkillInTraining.xml.aspx',
			'CharacterSkillQueue' => 'https://api.eveonline.com/char/SkillQueue.xml.aspx',
			'CharacterUpcomingCalendarEvents' => 'https://api.eveonline.com/char/UpcomingCalendarEvents.xml.aspx',
			'CharacterWalletJournal' => 'https://api.eveonline.com/char/WalletJournal.xml.aspx',
			'CharacterWalletJournalCSV' => 'https://api.eveonline.com/char/WalletJournal.csv.aspx',
			'CharacterWalletTransactions' => 'https://api.eveonline.com/char/WalletTransactions.xml.aspx',
			'CharacterWalletTransactionsCSV' => 'https://api.eveonline.com/char/WalletTransactions.csv.aspx',
			'CorporationAccountBalance' => 'https://api.eveonline.com/corp/AccountBalance.xml.aspx',
			'CorporationAssetList' => 'https://api.eveonline.com/corp/AssetList.xml.aspx',
			'CorporationContactList' => 'https://api.eveonline.com/corp/ContactList.xml.aspx',
			'ContainerLog' => 'https://api.eveonline.com/corp/ContainerLog.xml.aspx',
			'CorporationSheet' => 'https://api.eveonline.com/corp/CorporationSheet.xml.aspx',
			'CorporationFacWarStats' => 'https://api.eveonline.com/corp/FacWarStats.xml.aspx',
			'CorporationIndustryJobs' => 'https://api.eveonline.com/corp/IndustryJobs.xml.aspx',
			'CorporationKillLog' => 'https://api.eveonline.com/corp/KillLog.xml.aspx',
			'CorporationMarketOrders' => 'https://api.eveonline.com/corp/MarketOrders.xml.aspx',
			'CorporationMedals' => 'https://api.eveonline.com/corp/Medals.xml.aspx',
			'CorporationMemberMedals' => 'https://api.eveonline.com/corp/MemberMedals.xml.aspx',
			'CorporationMemberSecurity' => 'https://api.eveonline.com/corp/MemberSecurity.xml.aspx',
			'CorporationMemberSecurityLog' => 'https://api.eveonline.com/corp/MemberSecurityLog.xml.aspx',
			'CorporationMemberTracking' => 'https://api.eveonline.com/corp/MemberTracking.xml.aspx',
			'CorporationStandings' => 'https://api.eveonline.com/corp/Standings.xml.aspx',
			'CorporationOutpostList' => 'https://api.eveonline.com/corp/OutpostList.xml.aspx',
			'CorporationOutpostServiceDetail' => 'https://api.eveonline.com/corp/OutpostServiceDetail.xml.aspx',
			'CorporationStarbaseDetail' => 'https://api.eveonline.com/corp/StarbaseDetail.xml.aspx',
			'CorporationStarbaseList' => 'https://api.eveonline.com/corp/StarbaseList.xml.aspx',
			'CorporationShareholders' => 'https://api.eveonline.com/corp/Shareholders.xml.aspx',
			'CorporationTitles' => 'https://api.eveonline.com/corp/Titles.xml.aspx',
			'CorporationWalletJournal' => 'https://api.eveonline.com/corp/WalletJournal.xml.aspx',
			'CorporationWalletTransactions' => 'https://api.eveonline.com/corp/WalletTransactions.xml.aspx',
			'AllianceList' => 'https://api.eveonline.com/eve/AllianceList.xml.aspx',
			'CertificateTree' => 'https://api.eveonline.com/eve/CertificateTree.xml.aspx',
			'CharacterID' => 'https://api.eveonline.com/eve/CharacterID.xml.aspx',
			'CharacterInfo' => 'https://api.eveonline.com/eve/CharacterInfo.xml.aspx',
			'CharacterName' => 'https://api.eveonline.com/eve/CharacterName.xml.aspx',
			'ConquerableStationList' => 'https://api.eveonline.com/eve/ConquerableStationList.xml.aspx',
			'ErrorList' => 'https://api.eveonline.com/eve/ErrorList.xml.aspx',
			'FacWarStats' => 'https://api.eveonline.com/eve/FacWarStats.xml.aspx',
			'FacWarTopStats' => 'https://api.eveonline.com/eve/FacWarTopStats.xml.aspx',
			'RefTypes' => 'https://api.eveonline.com/eve/RefTypes.xml.aspx',
			'SkillTree' => 'https://api.eveonline.com/eve/SkillTree.xml.aspx',
			'FacWarSystems' => 'https://api.eveonline.com/map/FacWarSystems.xml.aspx',
			'MapsJumps' => 'http://wiki.eveonline.com/en/wiki/EVE_API_Maps_Jumps',
			'MapsKills' => 'http://wiki.eveonline.com/en/wiki/EVE_API_Maps_Kills',
			'MapsSovereignty' => 'http://wiki.eveonline.com/en/wiki/EVE_API_Maps_Sovereignty',
			'ServerStatus' => 'https://api.eveonline.com/server/ServerStatus.xml.aspx/'
	);

	public $accessMasks = array(
			'CharacterLocations' 			=> 134217728,	// Allows the fetching of coordinate and name data for items owned by the character.
			'CharacterContracts' 			=> 67108864,	// List of all Contracts the character is involved in.
			'AccountStatus' 			=> 33554432,	// EVE player account status.
			'CharacterCharacterInfo' 		=> 16777216,	// Sensitive Character Information, exposes account balance and last known location on top of the other Character Information call.
			'CharacterInfo'		 		=> 8388608,	// Character information, exposes skill points and current ship information on top of Show Infoinformation.
			'CharacterWalletTransactions' 		=> 4194304,	// Market transaction journal of character.
			'CharacterWalletJournal' 		=> 2097152,	// Wallet journal of character.
			'CharacterUpcomingCalendarEvents' 	=> 1048576,	// Upcoming events on characters calendar.
			'CharacterStandings' 			=> 524288,	// NPC Standings towards the character.
			'CharacterSkillQueue' 			=> 262144,	// Entire skill queue of character.
			'CharacterSkillInTraining' 		=> 131072,	// Skill currently in training on the character. Subset of entire Skill Queue.
			'CharacterResearch' 			=> 65536,	// List of all Research agents working for the character and the progress of the research.
			'CharacterNotificationTexts' 		=> 32768,	// Actual body of notifications sent to the character. Requires Notification access to function.
			'CharacterNotifications' 		=> 16384,	// List of recent notifications sent to the character.
			'CharacterMedals' 			=> 8192,	// Medals awarded to the character.
			'CharacterMarketOrders' 		=> 4096,	// List of all Market Orders the character has made.
			'CharacterMailMessages' 		=> 2048,	// List of all messages in the characters EVE Mail Inbox.
			'CharacterMailingLists' 		=> 1024,	// List of all Mailing Lists the character subscribes to.
			'CharacterMailBodies' 			=> 512,		// EVE Mail bodies. Requires MailMessages as well to function.
			'CharacterKillLog' 			=> 256,		// Characters kill log.
			'CharacterIndustryJobs' 		=> 128,		// Character jobs, completed and active.
			'CharacterFacWarStats' 			=> 64,		// Characters Factional Warfare Statistics.
			'CharacterContactNotifications' 	=> 32,		// Most recent contact notifications for the character.
			'CharacterContactList' 			=> 16,		// List of character contacts and relationship levels.
			'CharacterCharacterSheet' 		=> 8,		// Character Sheet information. Contains basicShow Infoinformation along with clones, account balance, implants, attributes, skills, certificates and corporation roles.'
			'CharacterCalendarEventAttendees' 	=> 4,		// Event attendee responses. Requires UpcomingCalendarEvents to function.
			'CharacterAssetList' 			=> 2,		// Entire asset list of character.
			'CharacterAccountBalance' 		=> 1,		// Current balance of characters wallet.
			'CorporationMemberTrackingExtended' 	=> 33554432,	// Extensive Member information. Time of last logoff, last known location and ship.
			'CorporationLocations' 			=> 16777216,	// Allows the fetching of coordinate and name data for items owned by the corporation.
			'CorporationContracts' 			=> 8388608,	// List of recent Contracts the corporation is involved in.
			'CorporationTitles' 			=> 4194304,	// Titles of corporation and the roles they grant.
			'CorporationWalletTransactions' 	=> 2097152,	// Market transactions of all corporate accounts.
			'CorporationWalletJournal' 		=> 1048576,	// Wallet journal for all corporate accounts.
			'CorporationStarbaseList' 		=> 524288,	// List of all corporate starbases.
			'CorporationStandings' 			=> 262144,	// NPC Standings towards corporation.
			'CorporationStarbaseDetail'		=> 131072,	// List of all settings of corporate starbases.
			'CorporationShareholders' 		=> 65536,	// Shareholders of the corporation.
			'CorporationOutpostServiceDetail' 	=> 32768,	// List of all service settings of corporate outposts.
			'CorporationOutpostList' 		=> 16384,	// List of all outposts controlled by the corporation.
			'CorporationMedals' 			=> 8192,	// List of all medals created by the corporation.
			'CorporationMarketOrders' 		=> 4096,	// List of all corporate market orders.
			'CorporationMemberTrackingLimited' 	=> 2048,	// Limited Member information.
			'CorporationMemberSecurityLog' 		=> 1024,	// Member role and title change log.
			'CorporationMemberSecurity' 		=> 512,		// Member roles and titles.
			'CorporationKillLog' 			=> 256,		// Corporation kill log.
			'CorporationIndustryJobs' 		=> 128,		// Corporation jobs, completed and active.
			'CorporationFacWarStats' 		=> 64,		// Corporations Factional Warfare Statistics.
			'CorporationContainerLog' 		=> 32,		// Corporate secure container acess log.
			'CorporationContactList' 		=> 16,		// Corporate contact list and relationships.
			'CorporationCorporationSheet' 		=> 8,		// Exposes basicShow Infoinformation as well as Member Limit and basic division and wallet info.
			'CorporationMemberMedals' 		=> 4,		// List of medals awarded to corporation members.
			'CorporationAssetList' 			=> 2,		// List of all corporation assets.
			'CorporationAccountBalance' 		=> 1,		// Current balance of all corporation accounts.
	);

	public $errorcodes = array(
			221 => 'Die Account-Informationen können nicht abgerufen werden, da die Rechte des API-Keys nicht ausreichend sind.',
			222 => 'Die Gültigkeit des API-Keys ist abgelaufen'
	);

	/**
  	  * Wallet Journal RefTypes
	  * http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Reference_Types
	  */

	public $refTypes = array(  
		'0' => 'Undefined',
		'1' => 'Player Trading',
		'2' => 'Market Transaction',
		'3' => 'GM Cash Transfer',
		'4' => 'ATM Withdraw',
		'5' => 'ATM Deposit',
		'6' => 'Backward Compatible',
		'7' => 'Mission Reward',
		'8' => 'Clone Activation',
		'9' => 'Inheritance',
		'10' => 'Player Donation',
		'11' => 'Corporation Payment',
		'12' => 'Docking Fee',
		'13' => 'Office Rental Fee',
		'14' => 'Factory Slot Rental Fee',
		'15' => 'Repair Bill',
		'16' => 'Bounty',
		'17' => 'Bounty Prize',
		'18' => 'Agents_temporary',
		'19' => 'Insurance',
		'20' => 'Mission Expiration',
		'21' => 'Mission Completion',
		'22' => 'Shares',
		'23' => 'Courier Mission Escrow',
		'24' => 'Mission Cost',
		'25' => 'Agent Miscellaneous',
		'26' => 'LP Store',
		'27' => 'Agent Location Services',
		'28' => 'Agent Donation',
		'29' => 'Agent Security Services',
		'30' => 'Agent Mission Collateral Paid',
		'31' => 'Agent Mission Collateral Refunded',
		'32' => 'Agents_preward',
		'33' => 'Agent Mission Reward',
		'34' => 'Agent Mission Time Bonus Reward',
		'35' => 'CSPA',
		'36' => 'CSPAOfflineRefund',
		'37' => 'Corporation Account Withdrawal',
		'38' => 'Corporation Dividend Payment',
		'39' => 'Corporation Registration Fee',
		'40' => 'Corporation Logo Change Cost',
		'41' => 'Release Of Impounded Property',
		'42' => 'Market Escrow',
		'43' => 'Agent Services Rendered',
		'44' => 'Market Fine Paid',
		'45' => 'Corporation Liquidation',
		'46' => 'Brokers Fee',
		'47' => 'Corporation Bulk Payment',
		'48' => 'Alliance Registration Fee',
		'49' => 'War Fee',
		'50' => 'Alliance Maintainance Fee',
		'51' => 'Contraband Fine',
		'52' => 'Clone Transfer',
		'53' => 'Acceleration Gate Fee',
		'54' => 'Transaction Tax',
		'55' => 'Jump Clone Installation Fee',
		'56' => 'Manufacturing',
		'57' => 'Researching Technology',
		'58' => 'Researching Time Productivity',
		'59' => 'Researching Material Productivity',
		'60' => 'Copying',
		'61' => 'Duplicating',
		'62' => 'Reverse Engineering',
		'63' => 'Contract Auction Bid',
		'64' => 'Contract Auction Bid Refund',
		'65' => 'Contract Collateral',
		'66' => 'Contract Reward Refund',
		'67' => 'Contract Auction Sold',
		'68' => 'Contract Reward',
		'69' => 'Contract Collateral Refund',
		'70' => 'Contract Collateral Payout',
		'71' => 'Contract Price',
		'72' => 'Contract Brokers Fee',
		'73' => 'Contract Sales Tax',
		'74' => 'Contract Deposit',
		'75' => 'Contract Deposit Sales Tax',
		'76' => 'Secure EVE Time Code Exchange',
		'77' => 'Contract Auction Bid (corp)',
		'78' => 'Contract Collateral Deposited (corp)',
		'79' => 'Contract Price Payment (corp)',
		'80' => 'Contract Brokers Fee (corp)',
		'81' => 'Contract Deposit (corp)',
		'82' => 'Contract Deposit Refund',
		'83' => 'Contract Reward Deposited',
		'84' => 'Contract Reward Deposited (corp)',
		'85' => 'Bounty Prizes',
		'86' => 'Advertisement Listing Fee',
		'87' => 'Medal Creation',
		'88' => 'Medal Issued',
		'89' => 'Betting',
		'90' => 'DNA Modification Fee',
		'91' => 'Sovereignity bill',
		'92' => 'Bounty Prize Corporation Tax',
		'93' => 'Agent Mission Reward Corporation Tax',
		'94' => 'Agent Mission Time Bonus Reward Corporation Tax',
		'95' => 'Upkeep adjustment fee',
		'96' => 'Planetary Import Tax',
		'97' => 'Planetary Export Tax',
		'98' => 'Planetary Construction',
		'99' => 'Corporate Reward Payout',
	);

	private function _request($host, $params = array()) {
		$full_path = $host . '?keyID=' . $this->keyID . '&vCode=' . $this->vCode . '&characterId=' . $this->characterID;
		if(!empty($params['fromID'])) {
			$full_path .= '&fromID=' . $params['fromID']; 
		}
		if(!empty($params['rowCount'])) {
			$full_path .= '&rowCount=' . $params['rowCount']; 
		}
		$date = date('D, d M Y G:i:s T',time());
		$header = array("Host: api.eveonline.com", "Date: ". $date);

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
			if(empty($params['csv'])) {
				try {
					$xml = Xml::toArray(Xml::build($response));
					$this->response = $xml['eveapi'];
					if(!empty($xml['eveapi']['error']['@code'])) {
						$this->error 		= $xml['eveapi']['error']['@code'];
						$this->errormessage 	= $xml['eveapi']['error']['@'];
						return false;
					} else {
						$this->error		= 0;
						$this->errormessage	= __d('EveOnlineApi', 'fly save');
						return true;
					}
				} catch(XmlException $e) {
					throw new InternalErrorException();
				}
			} else {
				//TODO CSV
			}
		}
	}

	/*
	 * Public functions
	*/

	public function init($keyID, $vCode, $characterID = null) {
		$this->characterID = $characterID;
		$this->keyID = $keyID;
		$this->vCode = $vCode;
	}

	public function validateAccessMask($accessMask, $names = array()) {
		if($accessMask == 268435455) {
			return true; // Full API
		} else if(is_array($names)) {
			foreach($names as $name) {
				if(!($accessMask & $this->accessMasks[$name])) {
					return false;
					break;
				}
			}
			return true;
		} else {
			throw new InternalErrorException();
		}
	}

	public function identifyTypeOfID($id) {
		if($id >= 99000000 && $id <= 100000000) {
			return "Alliance";
		} else if(($id >= 98000000 && $id < 99000000) || in_array($id, array(1119499077))) {
			return "Corporation"; 
		} else if($id >= 90000000 && $id < 98000000) {
			return "Character";
		} else if($id >= 1000002 && $id <= 1000182) {
			// NSC Corporation
			return "NSC Corporation";
		} else if($id >= 3008416 && $id <= 3019485) {
			// NSC Agent
			return "NSC Character";
		} else if($id >= 500001 && $id <= 500020) {
			// NSC Faction
			return "NSC Faction";
		} else {
			//Sadly this only applies to owners created after the 64 bit move.
			return "unknown";
		}
	}

	public function getImageURL($id, $size = 64) {
		if(!empty($id)) {
			$type = $this->identifyTypeOfID($id);
			switch($type) {
				case 'Alliance' :
					return 'http://image.eveonline.com/Alliance/' . $id . '_' . $size . '.jpg';
					break;
				case 'NSC Corporation' :
				case 'Corporation' :
					return 'http://image.eveonline.com/Corporation/' . $id . '_' . $size . '.png';
					break;
				case 'NSC Character' :
				case 'Character' :
				default:
					return 'http://image.eveonline.com/Character/' . $id . '_' . $size . '.jpg';
					break;
			}
		} else {
			return false;
		}
	}

	public function getAPIKeyInfo() {
		return $this->_request($this->urls['APIKeyInfo']);
	}

	/*
	 * Account - Status
	* http://wiki.eveonline.com/en/wiki/EVE_API_Account_Status
	*/

	public function getAccountStatus() {
		return $this->_request($this->urls['AccountStatus']);
	}

	/*
	 * Account - Characters
	* http://wiki.eveonline.com/en/wiki/EVE_API_Account_Characters
	*/

	public function getAccountCharacters() {
		return $this->_request($this->urls['AccountCharacters']);
	}

	/*
	 * Character - AccountBalance
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Account_Balance
	*/

	public function getCharacterAccountBalance() {
		return $this->_request($this->urls['CharacterAccountBalance']);
	}

	/*
	 * Character - AssetList
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Asset_List
	*/

	public function getCharacterAssetList() {
		return $this->_request($this->urls['CharacterAssetList']);
	}

	/*
	 * Character - CalendarEventAttendees
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Calendar_Event_Attendees
	*/

	public function getCalendarEventAttendees() {
		return $this->_request($this->urls['CalendarEventAttendees']);
	}

	/*
	 * Character - CharacterSheet
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Character_Sheet
	*/

	public function getCharacterSheet() {
		return $this->_request($this->urls['CharacterSheet']);
	}

	/*
	 * Character - ContactList
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Contact_List
	*/

	public function getCharacterContactList() {
		return $this->_request($this->urls['CharacterContactList']);
	}

	/*
	 * Character - ContactNotifications
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Contact_Notifications
	*/

	public function getCharacterContactNotifications() {
		return $this->_request($this->urls['CharacterContactNotifications']);
	}

	/*
	 * Character - FacWarStats
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Factional_Warfare_Statistics
	*/

	public function getCharacterFacWarStats() {
		return $this->_request($this->urls['CharacterFacWarStats']);
	}

	/*
	 * Character - IndustryJobs
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Industry_Jobs
	*/

	public function getCharacterIndustryJobs() {
		return $this->_request($this->urls['CharacterIndustryJobs']);
	}

	/*
	 * Character - KillLog
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Kill_Log
	*/

	public function getCharacterKillLog() {
		return $this->_request($this->urls['CharacterKillLog']);
	}

	/*
	 * Character - Mailinglists
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Mailing_Lists
	*/

	public function getCharacterMailinglists() {
		return $this->_request($this->urls['CharacterMailinglists']);
	}

	/*
	 * Character - MailBodies
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Mail_Bodies
	*/

	public function getCharacterMailBodies() {
		return $this->_request($this->urls['CharacterMailBodies']);
	}

	/*
	 * Character - MailMessages
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Mail_Messages
	*/

	public function getCharacterMailMessages() {
		return $this->_request($this->urls['CharacterMailMessages']);
	}

	/*
	 * Character - MarketOrders
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Market_Orders
	*/

	public function getCharacterMarketOrders() {
		return $this->_request($this->urls['CharacterMarketOrders']);
	}

	/*
	 * Character - Medals
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Medals
	*/

	public function getCharacterMedals() {
		return $this->_request($this->urls['CharacterMedals']);
	}

	/*
	 * Character - NotificationTexts
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Notification_Texts
	*/

	public function getCharacterNotificationTexts() {
		return $this->_request($this->urls['CharacterotificationTexts']);
	}

	/*
	 * Character - Notifications
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Notifications
	*/

	public function getCharacterNotifications() {
		return $this->_request($this->urls['CharacterNotifications']);
	}

	/*
	 * Character - Standings
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_NPC_Standings
	*/

	public function getCharacterStandings() {
		return $this->_request($this->urls['CharacterStandings']);
	}

	/*
	 * Character - Research
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Research
	*/

	public function getCharacterResearch() {
		return $this->_request($this->urls['CharacterResearch']);
	}

	/*
	 * Character - SkillInTraining
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Skill_In_Training
	*/

	public function getCharacterSkillInTraining() {
		return $this->_request($this->urls['CharacterSkillInTraining']);
	}

	/*
	 * Character - SkillQueue
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Skill_Queue
	*/

	public function getCharacterSkillQueue() {
		return $this->_request($this->urls['CharacterSkillQueue']);
	}

	/*
	 * Character - UpcomingCalendarEvents
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Upcoming_Calendar_Events
	*/

	public function getCharacterUpcomingCalendarEvents() {
		return $this->_request($this->urls['CharacterUpcomingCalendarEvents']);
	}

	/*
	 * Character - WalletJournal
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Wallet_Journal
	*/

	public function getCharacterWalletJournal($params = array()) {
		if(!empty($params['csv'])) {
			return $this->_request($this->urls['CharacterWalletJournalCSV'], $params);
		} else {
			return $this->_request($this->urls['CharacterWalletJournal'], $params);
		}
	}

	/*
	 * Character - WalletTransactions
	* http://wiki.eveonline.com/en/wiki/EVE_API_Character_Wallet_Transactions
	*/

	public function getCharacterWalletTransactions($params = array()) {
		if(!empty($params['csv'])) {
			return $this->_request($this->urls['CharacterWalletTransactionsCSV'], $params);
		} else {
			return $this->_request($this->urls['CharacterWalletTransactions'], $params);
		}
	}

	/*
	 * Corporation - AccountBalance
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Account_Balance
	*/

	public function getCorporationAccountBalance() {
		return $this->_request($this->urls['CorporationAccountBalance']);
	}

	/*
	 * Corporation - AssetList
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Asset_List
	*/

	public function getCorporationAssetList() {
		return $this->_request($this->urls['CorporationAssetList']);
	}

	/*
	 * Corporation - ContactList
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Contact_List
	*/

	public function getCorporationContactList() {
		return $this->_request($this->urls['CorporationContactList']);
	}

	/*
	 * Corporation - ContainerLog
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Container_Log
	*/

	public function getContainerLog() {
		return $this->_request($this->urls['ContainerLog']);
	}

	/*
	 * Corporation - CorporationSheet
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Corporation_Sheet
	*/

	public function getCorporationSheet() {
		return $this->_request($this->urls['CorporationSheet']);
	}

	/*
	 * Corporation - FacWarStats
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Factional_Warfare_Statistics
	*/

	public function getCorporationFacWarStats() {
		return $this->_request($this->urls['CorporationFacWarStats']);
	}

	/*
	 * Corporation - IndustryJobs
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Industry_Jobs
	*/

	public function getCorporationIndustryJobs() {
		return $this->_request($this->urls['CorporationIndustryJobs']);
	}

	/*
	 * Corporation - KillLog
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Kill_Log
	*/

	public function getCorporationKillLog() {
		return $this->_request($this->urls['CorporationKillLog']);
	}

	/*
	 * Corporation - MarketOrders
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Market_Orders
	*/

	public function getCorporationMarketOrders() {
		return $this->_request($this->urls['CorporationMarketOrders']);
	}

	/*
	 * Corporation - Medals
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Medals
	*/

	public function getCorporationMedals() {
		return $this->_request($this->urls['CorporationMedals']);
	}

	/*
	 * Corporation - MemberMedals
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Member_Medals
	*/

	public function getCorporationMemberMedals() {
		return $this->_request($this->urls['CorporationMemberMedals']);
	}

	/*
	 * Corporation - MemberSecurity
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Member_Security
	*/

	public function getCorporationMemberSecurity() {
		return $this->_request($this->urls['CorporationMemberSecurity']);
	}

	/*
	 * Corporation - MemberSecurityLog
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Member_Security_Log
	*/

	public function getCorporationMemberSecurityLog() {
		return $this->_request($this->urls['CorporationMemberSecurityLog']);
	}

	/*
	 * Corporation - MemberTracking
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Member_Tracking
	*/

	public function getCorporationMemberTracking() {
		return $this->_request($this->urls['CorporationMemberTracking']);
	}

	/*
	 * Corporation - Standings
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_NPC_Standings
	*/

	public function getCorporationStandings() {
		return $this->_request($this->urls['CorporationStandings']);
	}

	/*
	 * Corporation - OutpostList
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Outpost_List
	*/

	public function getCorporationOutpostList() {
		return $this->_request($this->urls['CorporationOutpostList']);
	}

	/*
	 * Corporation - OutpostServiceDetail
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Outpost_Service_Detail
	*/

	public function getCorporationOutpostServiceDetail() {
		return $this->_request($this->urls['CorporationOutpostServiceDetail']);
	}

	/*
	 * Corporation - StarbaseDetail
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_POS_Detail
	*/

	public function getCorporationStarbaseDetail() {
		return $this->_request($this->urls['CorporationStarbaseDetail']);
	}

	/*
	 * Corporation - StarbaseList
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_POS_List
	*/

	public function getCorporationStarbaseList() {
		return $this->_request($this->urls['CorporationStarbaseList']);
	}

	/*
	 * Corporation - Shareholders
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Shareholder
	*/

	public function getCorporationShareholders() {
		return $this->_request($this->urls['CorporationShareholders']);
	}

	/*
	 * Corporation - Titles
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Titles
	*/

	public function getCorporationTitles() {
		return $this->_request($this->urls['CorporationTitles']);
	}

	/*
	 * Corporation - WalletJournal
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Wallet_Journal
	*/

	public function getCorporationWalletJournal() {
		return $this->_request($this->urls['CorporationWalletJournal']);
	}

	/*
	 * Corporation - WalletTransaction
	* http://wiki.eveonline.com/en/wiki/EVE_API_Corporation_Wallet_Transactions
	*/

	public function getCorporationWalletTransactions() {
		return $this->_request($this->urls['CorporationWalletTransactions']);
	}

	/*
	 * EVE - AllianceList
	* http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Alliance_List
	*/

	public function getAllianceList() {
		return $this->_request($this->urls['AllianceList']);
	}

	/*
	 * EVE - CertificateTree
	* http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Certificate_Tree
	*/

	public function getCertificateTree() {
		return $this->_request($this->urls['CertificateTree']);
	}

	/*
	 * EVE - CharacterID
	* http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Character_ID
	*/

	public function getCharacterID() {
		return $this->_request($this->urls['CharacterID']);
	}

	/*
	 * EVE - CharacterInfo
	* http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Character_Info
	*/

	public function getCharacterInfo() {
		return $this->_request($this->urls['CharacterInfo']);
	}

	/*
	 * EVE - CharacterName
	* http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Character_Name
	*/

	public function getCharacterName() {
		return $this->_request($this->urls['CharacterName']);
	}

	/*
	 * EVE - ConquerableStationList
	* http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Conquerable_Station_List
	*/

	public function getConquerableStationList() {
		return $this->_request($this->urls['ConquerableStationList']);
	}

	/*
	 * EVE - ErrorList
	* http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Error_List
	*/

	public function getErrorList() {
		return $this->_request($this->urls['ErrorList']);
	}

	/*
	 * EVE - FacWarStats
	* http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Factional_Warfare_Statistics
	*/

	public function getFacWarStats() {
		return $this->_request($this->urls['FacWarStats']);
	}

	/*
	 * EVE - FacWarTopStats
	* http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Factional_Warfare_Top_Stats
	*/

	public function getFacWarTopStats() {
		return $this->_request($this->urls['FacWarTopStats']);
	}

	/*
	 * EVE - RefTypes
	* http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Reference_Types
	*/

	public function getRefTypes() {
		return $this->_request($this->urls['RefTypes']);
	}

	/*
	 * EVE - SkillTree
	* http://wiki.eveonline.com/en/wiki/EVE_API_EVE_Skill_Tree
	*/

	public function getSkillTree() {
		return $this->_request($this->urls['SkillTree']);
	}

	/*
	 * EVE -FacWarSystems
	* http://wiki.eveonline.com/en/wiki/EVE_API_Maps_Factional_Warfare_Systems
	*/

	public function getFacWarSystems() {
		return $this->_request($this->urls['FacWarSystems']);
	}

	/*
	 * EVE -MapsJumps
	* http://wiki.eveonline.com/en/wiki/EVE_API_Maps_Jumps
	*/

	public function getMapsJumps() {
		return $this->_request($this->urls['MapsJumps']);
	}

	/*
	 * EVE -MapsKills
	* http://wiki.eveonline.com/en/wiki/EVE_API_Maps_Kills
	*/

	public function getMapsKills() {
		return $this->_request($this->urls['MapsKills']);
	}

	/*
	 * EVE -MapsSovereignty
	* http://wiki.eveonline.com/en/wiki/EVE_API_Maps_Sovereignty
	*/

	public function getMapsSovereignty() {
		return $this->_request($this->urls['MapsSovereignty']);
	}

	/*
	 * EVE -Server Status
	* https://api.eveonline.com/server/ServerStatus.xml.aspx/
	*/

	public function getServerStatus() {
		return $this->_request($this->urls['ServerStatus']);
	}
}

