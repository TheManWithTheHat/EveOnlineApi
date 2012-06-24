<?php
/**
 * RamInstallationTypeContentFixture
 *
 */
class RamInstallationTypeContentFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'ramInstallationTypeContents';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'installationTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'assemblyLineTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'quantity' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'indexes' => array('PRIMARY' => array('column' => array('installationTypeID', 'assemblyLineTypeID'), 'unique' => 1), 'assemblyLineTypeID' => array('column' => 'assemblyLineTypeID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'installationTypeID' => 1,
			'assemblyLineTypeID' => 1,
			'quantity' => 1
		),
	);
}
