<?php
/**
 * RamAssemblyLineStationFixture
 *
 */
class RamAssemblyLineStationFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'ramAssemblyLineStations';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'stationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'assemblyLineTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'quantity' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'stationTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'ownerID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'solarSystemID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'regionID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => array('stationID', 'assemblyLineTypeID'), 'unique' => 1), 'ramAssemblyLineStations_IX_owner' => array('column' => 'ownerID', 'unique' => 0), 'ramAssemblyLineStations_IX_region' => array('column' => 'regionID', 'unique' => 0), 'assemblyLineTypeID' => array('column' => 'assemblyLineTypeID', 'unique' => 0), 'stationTypeID' => array('column' => 'stationTypeID', 'unique' => 0), 'solarSystemID' => array('column' => 'solarSystemID', 'unique' => 0)),
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
			'assemblyLineTypeID' => 1,
			'quantity' => 1,
			'stationTypeID' => 1,
			'ownerID' => 1,
			'solarSystemID' => 1,
			'regionID' => 1
		),
	);
}
