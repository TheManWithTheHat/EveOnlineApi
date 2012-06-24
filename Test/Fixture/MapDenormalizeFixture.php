<?php
/**
 * MapDenormalizeFixture
 *
 */
class MapDenormalizeFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'mapDenormalize';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'itemID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'typeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'groupID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'solarSystemID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'constellationID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'regionID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'orbitID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'x' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'y' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'z' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'radius' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'itemName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'security' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'celestialIndex' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'orbitIndex' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'indexes' => array('PRIMARY' => array('column' => 'itemID', 'unique' => 1), 'mapDenormalize_IX_constellation' => array('column' => 'constellationID', 'unique' => 0), 'mapDenormalize_IX_groupConstellation' => array('column' => array('groupID', 'constellationID'), 'unique' => 0), 'mapDenormalize_IX_groupRegion' => array('column' => array('groupID', 'regionID'), 'unique' => 0), 'mapDenormalize_IX_groupSystem' => array('column' => array('groupID', 'solarSystemID'), 'unique' => 0), 'mapDenormalize_IX_orbit' => array('column' => 'orbitID', 'unique' => 0), 'mapDenormalize_IX_region' => array('column' => 'regionID', 'unique' => 0), 'mapDenormalize_IX_system' => array('column' => 'solarSystemID', 'unique' => 0), 'typeID' => array('column' => 'typeID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'itemID' => 1,
			'typeID' => 1,
			'groupID' => 1,
			'solarSystemID' => 1,
			'constellationID' => 1,
			'regionID' => 1,
			'orbitID' => 1,
			'x' => 1,
			'y' => 1,
			'z' => 1,
			'radius' => 1,
			'itemName' => 'Lorem ipsum dolor sit amet',
			'security' => 1,
			'celestialIndex' => 1,
			'orbitIndex' => 1
		),
	);
}
