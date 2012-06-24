<?php
/**
 * MapLocationWormholeClassFixture
 *
 */
class MapLocationWormholeClassFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'mapLocationWormholeClasses';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'locationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'wormholeClassID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3),
		'indexes' => array('PRIMARY' => array('column' => 'locationID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'locationID' => 1,
			'wormholeClassID' => 1
		),
	);
}
