<?php
/**
 * DgmTypeEffectFixture
 *
 */
class DgmTypeEffectFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'dgmTypeEffects';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'typeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'effectID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'isDefault' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => array('typeID', 'effectID'), 'unique' => 1), 'effectID' => array('column' => 'effectID', 'unique' => 0)),
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
			'effectID' => 1,
			'isDefault' => 1
		),
	);
}
