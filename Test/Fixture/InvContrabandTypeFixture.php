<?php
/**
 * InvContrabandTypeFixture
 *
 */
class InvContrabandTypeFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invContrabandTypes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'factionID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'typeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'standingLoss' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'confiscateMinSec' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'fineByValue' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'attackMinSec' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => array('factionID', 'typeID'), 'unique' => 1), 'invContrabandTypes_IX_type' => array('column' => 'typeID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'factionID' => 1,
			'typeID' => 1,
			'standingLoss' => 1,
			'confiscateMinSec' => 1,
			'fineByValue' => 1,
			'attackMinSec' => 1
		),
	);
}
