<?php
/**
 * CrtCertificateFixture
 *
 */
class CrtCertificateFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'crtCertificates';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'certificateID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'categoryID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'classID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'grade' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'corpID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'iconID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'certificateID', 'unique' => 1), 'crtCertificates_IX_category' => array('column' => 'categoryID', 'unique' => 0), 'crtCertificates_IX_class' => array('column' => 'classID', 'unique' => 0), 'corpID' => array('column' => 'corpID', 'unique' => 0), 'iconID' => array('column' => 'iconID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'certificateID' => 1,
			'categoryID' => 1,
			'classID' => 1,
			'grade' => 1,
			'corpID' => 1,
			'iconID' => 1,
			'description' => 'Lorem ipsum dolor sit amet'
		),
	);
}
