<?php
/**
 * MapLandmarkFixture
 *
 */
class MapLandmarkFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'mapLandmarks';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'landmarkID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'landmarkName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 7000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'locationID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'x' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'y' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'z' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'radius' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'iconID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'importance' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'indexes' => array('PRIMARY' => array('column' => 'landmarkID', 'unique' => 1), 'locationID' => array('column' => 'locationID', 'unique' => 0), 'iconID' => array('column' => 'iconID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'landmarkID' => 1,
			'landmarkName' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'locationID' => 1,
			'x' => 1,
			'y' => 1,
			'z' => 1,
			'radius' => 1,
			'iconID' => 1,
			'importance' => 1
		),
	);
}
