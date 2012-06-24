<?php
/**
 * CrtClassFixture
 *
 */
class CrtClassFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'crtClasses';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'classID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'className' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 256, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'classID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'classID' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'className' => 'Lorem ipsum dolor sit amet'
		),
	);
}
