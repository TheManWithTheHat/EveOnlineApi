<?php
/**
 * RamAssemblyLineTypeDetailPerCategoryFixture
 *
 */
class RamAssemblyLineTypeDetailPerCategoryFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'ramAssemblyLineTypeDetailPerCategory';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'assemblyLineTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'categoryID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'timeMultiplier' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'materialMultiplier' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => array('assemblyLineTypeID', 'categoryID'), 'unique' => 1), 'categoryID' => array('column' => 'categoryID', 'unique' => 0)),
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
			'categoryID' => 1,
			'timeMultiplier' => 1,
			'materialMultiplier' => 1
		),
	);
}
