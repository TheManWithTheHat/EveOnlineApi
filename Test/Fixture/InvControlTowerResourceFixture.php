<?php
/**
 * InvControlTowerResourceFixture
 *
 */
class InvControlTowerResourceFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invControlTowerResources';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'controlTowerTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'resourceTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'purpose' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4, 'key' => 'index'),
		'quantity' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'minSecurityLevel' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'factionID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => array('controlTowerTypeID', 'resourceTypeID'), 'unique' => 1), 'resourceTypeID' => array('column' => 'resourceTypeID', 'unique' => 0), 'factionID' => array('column' => 'factionID', 'unique' => 0), 'purpose' => array('column' => 'purpose', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'controlTowerTypeID' => 1,
			'resourceTypeID' => 1,
			'purpose' => 1,
			'quantity' => 1,
			'minSecurityLevel' => 1,
			'factionID' => 1
		),
	);
}
