<?php
/**
 * PlanetSchematicsPinMapFixture
 *
 */
class PlanetSchematicsPinMapFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'planetSchematicsPinMap';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'schematicID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'pinTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'indexes' => array('PRIMARY' => array('column' => array('schematicID', 'pinTypeID'), 'unique' => 1), 'pinTypeID' => array('column' => 'pinTypeID', 'unique' => 0)),
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
			'pinTypeID' => 1
		),
	);
}
