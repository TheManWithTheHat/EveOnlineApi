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

	public $urls = array(	'AccountStatus' => 'https://api.eveonline.com/account/AccountStatus.xml.aspx',
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


	private function _request($host, $csv = false) {
		$full_path = $host . '?keyID=' . $this->keyID . '&vCode=' . $this->vCode . '&characterId=' . $this->characterID;
debug($full_path);
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
			if(!$csv) {
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

	public function getCharacterWalletJournal($csv = false) {
		if($csv) {
			return $this->_request($this->urls['CharacterWalletJournalCSV'], true);
		} else {
			return $this->_request($this->urls['CharacterWalletJournal']);
		}
	}

	/*
         * Character - WalletTransactions 
	 * http://wiki.eveonline.com/en/wiki/EVE_API_Character_Wallet_Transactions
         */

	public function getCharacterWalletTransactions($csv = false) {
		if($csv) {
			return $this->_request($this->urls['CharacterWalletTransactionsCSV'], true);
		} else {
			return $this->_request($this->urls['CharacterWalletTransactions']);
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

