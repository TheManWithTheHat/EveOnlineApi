<?php 
class EveOnlineApiSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $accounts = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 'cakePHP'),
		'keyID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'vCode' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'comment' => 'Verification Code', 'charset' => 'latin1'),
		'accessMask' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'userID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 'eveOnline'),
		'paidUntil' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'comment' => 'EVE Abo bezahlt bis'),
		'createDate' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'logonCount' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'logonMinutes' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'APIKEY' => array('column' => array('keyID', 'vCode'), 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);
	public $characters = array(
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'userID' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'characterID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'characterName' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'corporationID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'corporationName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'DoB' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'race' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bloodLine' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ancestry' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'gender' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'allianceName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 120, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'allianceID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'cloneName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cloneSkillPoints' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'balance' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'intelligence' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'intelligenceAugmentatorValue' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'memory' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'memoryAugmentatorValue' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'charisma' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'charismaAugmentatorValue' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'perception' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'perceptionAugmentatorValue' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'willpower' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'willpowerAugmentatorValue' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'skills' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'lvl1skills' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'lvl2skills' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'lvl3skills' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'lvl4skills' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'lvl5skills' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'skillpoints' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'certificates' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'lastApiUpdate' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'cachedUntil' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'last_walletjournal' => array('type' => 'float', 'null' => true, 'default' => NULL, 'comment' => 'id of last handled journal transactionID'),
		'indexes' => array('PRIMARY' => array('column' => 'characterID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);
	public $wallets = array(
		'transactionID' => array('type' => 'float', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'characterID' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'refTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'typeName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 40, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'typeID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'stationID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'stationName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 80, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'other_characterID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'other_characterName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 60, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'argID' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'argName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 40, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reason' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 40, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'balance' => array('type' => 'float', 'null' => true, 'default' => '0.00', 'length' => '16,2'),
		'amount' => array('type' => 'float', 'null' => true, 'default' => '0.00', 'length' => '16,2'),
		'price' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '16,2'),
		'taxReceiverID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'taxAmount' => array('type' => 'float', 'null' => true, 'default' => '0.00', 'length' => '16,2'),
		'quantity_left' => array('type' => 'integer', 'null' => true, 'default' => '0'),
		'indexes' => array('PRIMARY' => array('column' => 'transactionID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);
}
