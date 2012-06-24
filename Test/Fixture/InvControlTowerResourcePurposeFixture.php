<?php
/**
 * InvControlTowerResourcePurposeFixture
 *
 */
class InvControlTowerResourcePurposeFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invControlTowerResourcePurposes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'purpose' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4, 'key' => 'primary'),
		'purposeText' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'purpose', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'purpose' => 1,
			'purposeText' => 'Lorem ipsum dolor sit amet'
		),
	);
}
