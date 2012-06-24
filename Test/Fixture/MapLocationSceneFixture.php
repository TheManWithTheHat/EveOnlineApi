<?php
/**
 * MapLocationSceneFixture
 *
 */
class MapLocationSceneFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'mapLocationScenes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'locationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'sceneID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3),
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
			'sceneID' => 1
		),
	);
}
