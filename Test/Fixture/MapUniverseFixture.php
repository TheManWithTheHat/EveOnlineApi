<?php
/**
 * MapUniverseFixture
 *
 */
class MapUniverseFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'mapUniverse';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'universeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'universeName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'x' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'y' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'z' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'xMin' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'xMax' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'yMin' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'yMax' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'zMin' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'zMax' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'radius' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'universeID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'universeID' => 1,
			'universeName' => 'Lorem ipsum dolor sit amet',
			'x' => 1,
			'y' => 1,
			'z' => 1,
			'xMin' => 1,
			'xMax' => 1,
			'yMin' => 1,
			'yMax' => 1,
			'zMin' => 1,
			'zMax' => 1,
			'radius' => 1
		),
	);
}
