<?php
/**
 * RamAssemblyLineTypeDetailPerGroupFixture
 *
 */
class RamAssemblyLineTypeDetailPerGroupFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'ramAssemblyLineTypeDetailPerGroup';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'assemblyLineTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'groupID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'timeMultiplier' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'materialMultiplier' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => array('assemblyLineTypeID', 'groupID'), 'unique' => 1), 'groupID' => array('column' => 'groupID', 'unique' => 0)),
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
			'groupID' => 1,
			'timeMultiplier' => 1,
			'materialMultiplier' => 1
		),
	);
}
