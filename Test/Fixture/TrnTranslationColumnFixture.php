<?php
/**
 * TrnTranslationColumnFixture
 *
 */
class TrnTranslationColumnFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'trnTranslationColumns';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'tcGroupID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'tcID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'tableName' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 256, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'columnName' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 128, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'masterID' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 128, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'tcID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'tcGroupID' => 1,
			'tcID' => 1,
			'tableName' => 'Lorem ipsum dolor sit amet',
			'columnName' => 'Lorem ipsum dolor sit amet',
			'masterID' => 'Lorem ipsum dolor sit amet'
		),
	);
}
