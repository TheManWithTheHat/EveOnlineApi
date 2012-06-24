<?php
/**
 * CrpNPCCorporationFixture
 *
 */
class CrpNPCCorporationFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'crpNPCCorporations';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'corporationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'size' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'extent' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'solarSystemID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'investorID1' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'investorShares1' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'investorID2' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'investorShares2' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'investorID3' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'investorShares3' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'investorID4' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'investorShares4' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'friendID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'enemyID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'publicShares' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'initialPrice' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'minSecurity' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'scattered' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'fringe' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'corridor' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'hub' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'border' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'factionID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'sizeFactor' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'stationCount' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'stationSystemCount' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 4000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'iconID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'corporationID', 'unique' => 1), 'solarSystemID' => array('column' => 'solarSystemID', 'unique' => 0), 'iconID' => array('column' => 'iconID', 'unique' => 0), 'factionID' => array('column' => 'factionID', 'unique' => 0), 'investorID1' => array('column' => 'investorID1', 'unique' => 0), 'investorID2' => array('column' => 'investorID2', 'unique' => 0), 'investorID3' => array('column' => 'investorID3', 'unique' => 0), 'investorID4' => array('column' => 'investorID4', 'unique' => 0), 'friendID' => array('column' => 'friendID', 'unique' => 0), 'enemyID' => array('column' => 'enemyID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'corporationID' => 1,
			'size' => 'Lorem ipsum dolor sit ame',
			'extent' => 'Lorem ipsum dolor sit ame',
			'solarSystemID' => 1,
			'investorID1' => 1,
			'investorShares1' => 1,
			'investorID2' => 1,
			'investorShares2' => 1,
			'investorID3' => 1,
			'investorShares3' => 1,
			'investorID4' => 1,
			'investorShares4' => 1,
			'friendID' => 1,
			'enemyID' => 1,
			'publicShares' => 1,
			'initialPrice' => 1,
			'minSecurity' => 1,
			'scattered' => 1,
			'fringe' => 1,
			'corridor' => 1,
			'hub' => 1,
			'border' => 1,
			'factionID' => 1,
			'sizeFactor' => 1,
			'stationCount' => 1,
			'stationSystemCount' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'iconID' => 1
		),
	);
}
