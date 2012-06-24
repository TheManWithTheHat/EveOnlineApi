<?php
/**
 * StaOperationFixture
 *
 */
class StaOperationFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'staOperations';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'activityID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'operationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'operationName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'fringe' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'corridor' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'hub' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'border' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'ratio' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'caldariStationTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'minmatarStationTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'amarrStationTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'gallenteStationTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'joveStationTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'operationID', 'unique' => 1), 'activityID' => array('column' => 'activityID', 'unique' => 0), 'caldariStationTypeID' => array('column' => 'caldariStationTypeID', 'unique' => 0), 'minmatarStationTypeID' => array('column' => 'minmatarStationTypeID', 'unique' => 0), 'amarrStationTypeID' => array('column' => 'amarrStationTypeID', 'unique' => 0), 'gallenteStationTypeID' => array('column' => 'gallenteStationTypeID', 'unique' => 0), 'joveStationTypeID' => array('column' => 'joveStationTypeID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'activityID' => 1,
			'operationID' => 1,
			'operationName' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'fringe' => 1,
			'corridor' => 1,
			'hub' => 1,
			'border' => 1,
			'ratio' => 1,
			'caldariStationTypeID' => 1,
			'minmatarStationTypeID' => 1,
			'amarrStationTypeID' => 1,
			'gallenteStationTypeID' => 1,
			'joveStationTypeID' => 1
		),
	);
}
