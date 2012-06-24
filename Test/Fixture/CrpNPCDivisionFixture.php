<?php
/**
 * CrpNPCDivisionFixture
 *
 */
class CrpNPCDivisionFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'crpNPCDivisions';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'divisionID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'divisionName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'leaderType' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'divisionID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'divisionID' => 1,
			'divisionName' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'leaderType' => 'Lorem ipsum dolor sit amet'
		),
	);
}
