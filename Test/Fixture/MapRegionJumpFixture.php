<?php
/**
 * MapRegionJumpFixture
 *
 */
class MapRegionJumpFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'mapRegionJumps';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'fromRegionID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'toRegionID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'indexes' => array('PRIMARY' => array('column' => array('fromRegionID', 'toRegionID'), 'unique' => 1), 'toRegionID' => array('column' => 'toRegionID', 'unique' => 0)),
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
			'toRegionID' => 1
		),
	);
}
