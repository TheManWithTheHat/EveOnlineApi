<?php
/**
 * RamAssemblyLineFixture
 *
 */
class RamAssemblyLineFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'ramAssemblyLines';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'assemblyLineID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'assemblyLineTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'containerID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'nextFreeTime' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'UIGroupingID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3),
		'costInstall' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'costPerHour' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'restrictionMask' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'discountPerGoodStandingPoint' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'surchargePerBadStandingPoint' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'minimumStanding' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'minimumCharSecurity' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'minimumCorpSecurity' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'maximumCharSecurity' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'maximumCorpSecurity' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'ownerID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'activityID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'assemblyLineID', 'unique' => 1), 'ramAssemblyLines_IX_container' => array('column' => 'containerID', 'unique' => 0), 'ramAssemblyLines_IX_owner' => array('column' => 'ownerID', 'unique' => 0), 'assemblyLineTypeID' => array('column' => 'assemblyLineTypeID', 'unique' => 0), 'activityID' => array('column' => 'activityID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'assemblyLineID' => 1,
			'assemblyLineTypeID' => 1,
			'containerID' => 1,
			'nextFreeTime' => '2012-06-24 18:48:14',
			'UIGroupingID' => 1,
			'costInstall' => 1,
			'costPerHour' => 1,
			'restrictionMask' => 1,
			'discountPerGoodStandingPoint' => 1,
			'surchargePerBadStandingPoint' => 1,
			'minimumStanding' => 1,
			'minimumCharSecurity' => 1,
			'minimumCorpSecurity' => 1,
			'maximumCharSecurity' => 1,
			'maximumCorpSecurity' => 1,
			'ownerID' => 1,
			'activityID' => 1
		),
	);
}
