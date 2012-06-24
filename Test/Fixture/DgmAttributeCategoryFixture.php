<?php
/**
 * DgmAttributeCategoryFixture
 *
 */
class DgmAttributeCategoryFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'dgmAttributeCategories';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'categoryID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'categoryName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'categoryDescription' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'categoryName' => 'Lorem ipsum dolor sit amet',
			'categoryDescription' => 'Lorem ipsum dolor sit amet'
		),
	);
}
