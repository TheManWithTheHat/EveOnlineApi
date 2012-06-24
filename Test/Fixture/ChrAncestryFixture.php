<?php
/**
 * ChrAncestryFixture
 *
 */
class ChrAncestryFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'chrAncestries';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ancestryID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'ancestryName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'bloodlineID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'perception' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'willpower' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'charisma' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'memory' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'intelligence' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'iconID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'shortDescription' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'ancestryID', 'unique' => 1), 'bloodlineID' => array('column' => 'bloodlineID', 'unique' => 0), 'iconID' => array('column' => 'iconID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'ancestryID' => 1,
			'ancestryName' => 'Lorem ipsum dolor sit amet',
			'bloodlineID' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'perception' => 1,
			'willpower' => 1,
			'charisma' => 1,
			'memory' => 1,
			'intelligence' => 1,
			'iconID' => 1,
			'shortDescription' => 'Lorem ipsum dolor sit amet'
		),
	);
}
