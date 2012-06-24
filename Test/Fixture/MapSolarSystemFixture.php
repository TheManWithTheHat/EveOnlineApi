<?php
/**
 * MapSolarSystemFixture
 *
 */
class MapSolarSystemFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'mapSolarSystems';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'regionID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'constellationID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'solarSystemID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'solarSystemName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'x' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'y' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'z' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'xMin' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'xMax' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'yMin' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'yMax' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'zMin' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'zMax' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'luminosity' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'border' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'fringe' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'corridor' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'hub' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'international' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'regional' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'constellation' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'security' => array('type' => 'float', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'factionID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'radius' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'sunTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'securityClass' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'solarSystemID', 'unique' => 1), 'solarSystemID' => array('column' => array('solarSystemID', 'constellationID', 'regionID'), 'unique' => 1), 'mapSolarSystems_IX_constellation' => array('column' => 'constellationID', 'unique' => 0), 'mapSolarSystems_IX_region' => array('column' => 'regionID', 'unique' => 0), 'mapSolarSystems_IX_security' => array('column' => 'security', 'unique' => 0), 'factionID' => array('column' => 'factionID', 'unique' => 0), 'sunTypeID' => array('column' => 'sunTypeID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'regionID' => 1,
			'constellationID' => 1,
			'solarSystemID' => 1,
			'solarSystemName' => 'Lorem ipsum dolor sit amet',
			'x' => 1,
			'y' => 1,
			'z' => 1,
			'xMin' => 1,
			'xMax' => 1,
			'yMin' => 1,
			'yMax' => 1,
			'zMin' => 1,
			'zMax' => 1,
			'luminosity' => 1,
			'border' => 1,
			'fringe' => 1,
			'corridor' => 1,
			'hub' => 1,
			'international' => 1,
			'regional' => 1,
			'constellation' => 1,
			'security' => 1,
			'factionID' => 1,
			'radius' => 1,
			'sunTypeID' => 1,
			'securityClass' => ''
		),
	);
}
