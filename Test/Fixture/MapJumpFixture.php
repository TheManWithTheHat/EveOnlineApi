<?php
/**
 * MapJumpFixture
 *
 */
class MapJumpFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'mapJumps';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'stargateID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'celestialID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'stargateID', 'unique' => 1), 'celestialID' => array('column' => 'celestialID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'stargateID' => 1,
			'celestialID' => 1
		),
	);
}
