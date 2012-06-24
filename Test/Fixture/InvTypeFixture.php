<?php
/**
 * InvTypeFixture
 *
 */
class InvTypeFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invTypes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'typeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'groupID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'typeName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 3000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'graphicID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'radius' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'mass' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'volume' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'capacity' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'portionSize' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'raceID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'basePrice' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'published' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'marketGroupID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'chanceOfDuplicating' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'iconID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'typeID', 'unique' => 1), 'invTypes_IX_Group' => array('column' => 'groupID', 'unique' => 0), 'graphicID' => array('column' => 'graphicID', 'unique' => 0), 'raceID' => array('column' => 'raceID', 'unique' => 0), 'marketGroupID' => array('column' => 'marketGroupID', 'unique' => 0), 'iconID' => array('column' => 'iconID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'typeID' => 1,
			'groupID' => 1,
			'typeName' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'graphicID' => 1,
			'radius' => 1,
			'mass' => 1,
			'volume' => 1,
			'capacity' => 1,
			'portionSize' => 1,
			'raceID' => 1,
			'basePrice' => 1,
			'published' => 1,
			'marketGroupID' => 1,
			'chanceOfDuplicating' => 1,
			'iconID' => 1
		),
	);
}
