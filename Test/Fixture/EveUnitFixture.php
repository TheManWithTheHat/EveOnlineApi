<?php
/**
 * EveUnitFixture
 *
 */
class EveUnitFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'eveUnits';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'unitID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'unitName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'displayName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'unitID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'unitID' => 1,
			'unitName' => 'Lorem ipsum dolor sit amet',
			'displayName' => 'Lorem ipsum dolor ',
			'description' => 'Lorem ipsum dolor sit amet'
		),
	);
}
