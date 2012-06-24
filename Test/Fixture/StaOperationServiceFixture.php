<?php
/**
 * StaOperationServiceFixture
 *
 */
class StaOperationServiceFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'staOperationServices';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'operationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'serviceID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'indexes' => array('PRIMARY' => array('column' => array('operationID', 'serviceID'), 'unique' => 1), 'serviceID' => array('column' => 'serviceID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'operationID' => 1,
			'serviceID' => 1
		),
	);
}
