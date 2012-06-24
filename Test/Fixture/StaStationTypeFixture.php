<?php
/**
 * StaStationTypeFixture
 *
 */
class StaStationTypeFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'staStationTypes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'stationTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'dockEntryX' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'dockEntryY' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'dockEntryZ' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'dockOrientationX' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'dockOrientationY' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'dockOrientationZ' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'operationID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'officeSlots' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'reprocessingEfficiency' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'conquerable' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'stationTypeID', 'unique' => 1), 'operationID' => array('column' => 'operationID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'stationTypeID' => 1,
			'dockEntryX' => 1,
			'dockEntryY' => 1,
			'dockEntryZ' => 1,
			'dockOrientationX' => 1,
			'dockOrientationY' => 1,
			'dockOrientationZ' => 1,
			'operationID' => 1,
			'officeSlots' => 1,
			'reprocessingEfficiency' => 1,
			'conquerable' => 1
		),
	);
}
