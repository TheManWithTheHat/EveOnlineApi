<?php
/**
 * InvTypeMaterialFixture
 *
 */
class InvTypeMaterialFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invTypeMaterials';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'typeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'materialTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => array('typeID', 'materialTypeID'), 'unique' => 1), 'materialTypeID' => array('column' => 'materialTypeID', 'unique' => 0)),
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
			'materialTypeID' => 1,
			'quantity' => 1
		),
	);
}
