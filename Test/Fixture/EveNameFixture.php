<?php
/**
 * EveNameFixture
 *
 */
class EveNameFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'eveNames';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'itemID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'itemName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'categoryID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'groupID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'typeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'itemID', 'unique' => 1), 'categoryID' => array('column' => 'categoryID', 'unique' => 0), 'groupID' => array('column' => 'groupID', 'unique' => 0), 'typeID' => array('column' => 'typeID', 'unique' => 0)),
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
			'itemName' => 'Lorem ipsum dolor sit amet',
			'categoryID' => 1,
			'groupID' => 1,
			'typeID' => 1
		),
	);
}
