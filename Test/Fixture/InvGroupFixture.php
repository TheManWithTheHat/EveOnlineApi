<?php
/**
 * InvGroupFixture
 *
 */
class InvGroupFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invGroups';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'groupID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'categoryID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'groupName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 3000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'iconID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'useBasePrice' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'allowManufacture' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'allowRecycler' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'anchored' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'anchorable' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'fittableNonSingleton' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'published' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'groupID', 'unique' => 1), 'invGroups_IX_category' => array('column' => 'categoryID', 'unique' => 0), 'iconID' => array('column' => 'iconID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'groupID' => 1,
			'categoryID' => 1,
			'groupName' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'iconID' => 1,
			'useBasePrice' => 1,
			'allowManufacture' => 1,
			'allowRecycler' => 1,
			'anchored' => 1,
			'anchorable' => 1,
			'fittableNonSingleton' => 1,
			'published' => 1
		),
	);
}
