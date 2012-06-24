<?php
/**
 * StaStationFixture
 *
 */
class StaStationFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'staStations';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'stationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'security' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'dockingCostPerVolume' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'maxShipVolumeDockable' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'officeRentalCost' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'operationID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'stationTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'corporationID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'solarSystemID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'constellationID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'regionID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'stationName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'x' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'y' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'z' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'reprocessingEfficiency' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'reprocessingStationsTake' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'reprocessingHangarFlag' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'indexes' => array('PRIMARY' => array('column' => 'stationID', 'unique' => 1), 'staStations_IX_constellation' => array('column' => 'constellationID', 'unique' => 0), 'staStations_IX_corporation' => array('column' => 'corporationID', 'unique' => 0), 'staStations_IX_operation' => array('column' => 'operationID', 'unique' => 0), 'staStations_IX_region' => array('column' => 'regionID', 'unique' => 0), 'staStations_IX_system' => array('column' => 'solarSystemID', 'unique' => 0), 'staStations_IX_type' => array('column' => 'stationTypeID', 'unique' => 0), 'solarSystemID' => array('column' => array('solarSystemID', 'constellationID', 'regionID'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'stationID' => 1,
			'security' => 1,
			'dockingCostPerVolume' => 1,
			'maxShipVolumeDockable' => 1,
			'officeRentalCost' => 1,
			'operationID' => 1,
			'stationTypeID' => 1,
			'corporationID' => 1,
			'solarSystemID' => 1,
			'constellationID' => 1,
			'regionID' => 1,
			'stationName' => 'Lorem ipsum dolor sit amet',
			'x' => 1,
			'y' => 1,
			'z' => 1,
			'reprocessingEfficiency' => 1,
			'reprocessingStationsTake' => 1,
			'reprocessingHangarFlag' => 1
		),
	);
}
