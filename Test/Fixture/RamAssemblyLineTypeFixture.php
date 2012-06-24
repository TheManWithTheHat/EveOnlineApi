<?php
/**
 * RamAssemblyLineTypeFixture
 *
 */
class RamAssemblyLineTypeFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'ramAssemblyLineTypes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'assemblyLineTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'assemblyLineTypeName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'baseTimeMultiplier' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'baseMaterialMultiplier' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'volume' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'activityID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'minCostPerHour' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'assemblyLineTypeID', 'unique' => 1), 'activityID' => array('column' => 'activityID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'assemblyLineTypeID' => 1,
			'assemblyLineTypeName' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'baseTimeMultiplier' => 1,
			'baseMaterialMultiplier' => 1,
			'volume' => 1,
			'activityID' => 1,
			'minCostPerHour' => 1
		),
	);
}
