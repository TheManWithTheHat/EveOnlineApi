<?php
/**
 * CrtCategoryFixture
 *
 */
class CrtCategoryFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'crtCategories';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'categoryID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'categoryName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 256, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'categoryID', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'categoryID' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'categoryName' => 'Lorem ipsum dolor sit amet'
		),
	);
}
