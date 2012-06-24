<?php
/**
 * InvCategoryFixture
 *
 */
class InvCategoryFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invCategories';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'categoryID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3, 'key' => 'primary'),
		'categoryName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 3000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'iconID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'published' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'categoryID', 'unique' => 1), 'iconID' => array('column' => 'iconID', 'unique' => 0)),
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
			'description' => 'Lorem ipsum dolor sit amet',
			'iconID' => 1,
			'published' => 1
		),
	);
}
