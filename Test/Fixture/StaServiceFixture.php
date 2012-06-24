<?php
/**
 * StaServiceFixture
 *
 */
class StaServiceFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'staServices';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'serviceID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'serviceName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'serviceID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'serviceID' => 1,
			'serviceName' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
	);
}
