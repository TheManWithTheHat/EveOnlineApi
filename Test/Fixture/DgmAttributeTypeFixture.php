<?php
/**
 * DgmAttributeTypeFixture
 *
 */
class DgmAttributeTypeFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'dgmAttributeTypes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'attributeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'attributeName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'iconID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'defaultValue' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'published' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'displayName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'unitID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'stackable' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'highIsGood' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'categoryID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'attributeID', 'unique' => 1), 'categoryID' => array('column' => 'categoryID', 'unique' => 0), 'unitID' => array('column' => 'unitID', 'unique' => 0), 'iconID' => array('column' => 'iconID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'attributeID' => 1,
			'attributeName' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'iconID' => 1,
			'defaultValue' => 1,
			'published' => 1,
			'displayName' => 'Lorem ipsum dolor sit amet',
			'unitID' => 1,
			'stackable' => 1,
			'highIsGood' => 1,
			'categoryID' => 1
		),
	);
}
