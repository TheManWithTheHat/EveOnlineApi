<?php
/**
 * EveIconFixture
 *
 */
class EveIconFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'eveIcons';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'iconID' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6, 'key' => 'primary'),
		'iconFile' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 16000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'iconID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'iconID' => 1,
			'iconFile' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
	);
}
