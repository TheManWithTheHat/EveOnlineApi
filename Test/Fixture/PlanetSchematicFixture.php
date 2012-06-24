<?php
/**
 * PlanetSchematicFixture
 *
 */
class PlanetSchematicFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'planetSchematics';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'schematicID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'schematicName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cycleTime' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'schematicID', 'unique' => 1)),
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
			'schematicName' => 'Lorem ipsum dolor sit amet',
			'cycleTime' => 1
		),
	);
}
