<?php
/**
 * EveGraphicFixture
 *
 */
class EveGraphicFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'eveGraphics';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'graphicID' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6, 'key' => 'primary'),
		'graphicFile' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 16000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'obsolete' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'graphicType' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'collidable' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'explosionID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'directoryID' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'graphicName' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'graphicID', 'unique' => 1), 'explosionID' => array('column' => 'explosionID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'graphicID' => 1,
			'graphicFile' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'obsolete' => 1,
			'graphicType' => 'Lorem ipsum dolor sit amet',
			'collidable' => 1,
			'explosionID' => 1,
			'directoryID' => 1,
			'graphicName' => 'Lorem ipsum dolor sit amet'
		),
	);
}
