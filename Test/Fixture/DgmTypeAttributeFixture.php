<?php
/**
 * DgmTypeAttributeFixture
 *
 */
class DgmTypeAttributeFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'dgmTypeAttributes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'typeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'attributeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'valueInt' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'valueFloat' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => array('typeID', 'attributeID'), 'unique' => 1), 'attributeID' => array('column' => 'attributeID', 'unique' => 0)),
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
			'attributeID' => 1,
			'valueInt' => 1,
			'valueFloat' => 1
		),
	);
}
