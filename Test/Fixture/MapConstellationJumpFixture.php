<?php
/**
 * MapConstellationJumpFixture
 *
 */
class MapConstellationJumpFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'mapConstellationJumps';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'fromRegionID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'fromConstellationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'toConstellationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'toRegionID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => array('fromConstellationID', 'toConstellationID'), 'unique' => 1), 'mapConstellationJumps_IX_fromRegion' => array('column' => 'fromRegionID', 'unique' => 0), 'toConstellationID' => array('column' => array('toConstellationID', 'toRegionID'), 'unique' => 0), 'fromConstellationID' => array('column' => array('fromConstellationID', 'fromRegionID'), 'unique' => 0)),
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
			'toConstellationID' => 1,
			'toRegionID' => 1
		),
	);
}
