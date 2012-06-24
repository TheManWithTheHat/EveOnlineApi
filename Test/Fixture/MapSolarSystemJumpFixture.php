<?php
/**
 * MapSolarSystemJumpFixture
 *
 */
class MapSolarSystemJumpFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'mapSolarSystemJumps';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'fromRegionID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'fromConstellationID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'fromSolarSystemID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'toSolarSystemID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'toConstellationID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'toRegionID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => array('fromSolarSystemID', 'toSolarSystemID'), 'unique' => 1), 'mapSolarSystemJumps_IX_fromConstellation' => array('column' => 'fromConstellationID', 'unique' => 0), 'mapSolarSystemJumps_IX_fromRegion' => array('column' => 'fromRegionID', 'unique' => 0), 'fromSolarSystemID' => array('column' => array('fromSolarSystemID', 'fromConstellationID', 'fromRegionID'), 'unique' => 0), 'toSolarSystemID' => array('column' => array('toSolarSystemID', 'toConstellationID', 'toRegionID'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'fromRegionID' => 1,
			'fromConstellationID' => 1,
			'fromSolarSystemID' => 1,
			'toSolarSystemID' => 1,
			'toConstellationID' => 1,
			'toRegionID' => 1
		),
	);
}
