<?php
/**
 * CrpNPCCorporationTradeFixture
 *
 */
class CrpNPCCorporationTradeFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'crpNPCCorporationTrades';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'corporationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'typeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'indexes' => array('PRIMARY' => array('column' => array('corporationID', 'typeID'), 'unique' => 1), 'typeID' => array('column' => 'typeID', 'unique' => 0)),
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
			'typeID' => 1
		),
	);
}
