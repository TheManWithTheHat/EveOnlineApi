<?php
/**
 * MapCelestialStatisticFixture
 *
 */
class MapCelestialStatisticFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'mapCelestialStatistics';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'celestialID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'temperature' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'spectralClass' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'luminosity' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'age' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'life' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'orbitRadius' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'eccentricity' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'massDust' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'massGas' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'fragmented' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'density' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'surfaceGravity' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'escapeVelocity' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'orbitPeriod' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'rotationRate' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'locked' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'pressure' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'radius' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'mass' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'celestialID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'celestialID' => 1,
			'temperature' => 1,
			'spectralClass' => 'Lorem ip',
			'luminosity' => 1,
			'age' => 1,
			'life' => 1,
			'orbitRadius' => 1,
			'eccentricity' => 1,
			'massDust' => 1,
			'massGas' => 1,
			'fragmented' => 1,
			'density' => 1,
			'surfaceGravity' => 1,
			'escapeVelocity' => 1,
			'orbitPeriod' => 1,
			'rotationRate' => 1,
			'locked' => 1,
			'pressure' => 1,
			'radius' => 1,
			'mass' => 1
		),
	);
}
