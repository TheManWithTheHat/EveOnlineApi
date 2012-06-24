<?php
/**
 * RamTypeRequirementFixture
 *
 */
class RamTypeRequirementFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'ramTypeRequirements';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'typeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'activityID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'requiredTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'quantity' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'damagePerJob' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'recycle' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => array('typeID', 'activityID', 'requiredTypeID'), 'unique' => 1), 'requiredTypeID' => array('column' => 'requiredTypeID', 'unique' => 0), 'activityID' => array('column' => 'activityID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'typeID' => 1,
			'activityID' => 1,
			'requiredTypeID' => 1,
			'quantity' => 1,
			'damagePerJob' => 1,
			'recycle' => 1
		),
	);
}
