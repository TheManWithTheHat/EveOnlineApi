<?php
/**
 * PlanetSchematicsTypeMapFixture
 *
 */
class PlanetSchematicsTypeMapFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'planetSchematicsTypeMap';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'schematicID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'typeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'quantity' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'isInput' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => array('schematicID', 'typeID'), 'unique' => 1), 'typeID' => array('column' => 'typeID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'schematicID' => 1,
			'typeID' => 1,
			'quantity' => 1,
			'isInput' => 1
		),
	);
}
