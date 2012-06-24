<?php
/**
 * InvFlagFixture
 *
 */
class InvFlagFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invFlags';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'flagID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'flagName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'flagText' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'orderID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'flagID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'flagID' => 1,
			'flagName' => 'Lorem ipsum dolor sit amet',
			'flagText' => 'Lorem ipsum dolor sit amet',
			'orderID' => 1
		),
	);
}
