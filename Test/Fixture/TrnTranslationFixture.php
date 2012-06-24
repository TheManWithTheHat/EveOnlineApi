<?php
/**
 * TrnTranslationFixture
 *
 */
class TrnTranslationFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'trnTranslations';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'tcID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'keyID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'languageID' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'text' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 16000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => array('tcID', 'keyID', 'languageID'), 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'tcID' => 1,
			'keyID' => 1,
			'languageID' => '',
			'text' => 'Lorem ipsum dolor sit amet'
		),
	);
}
