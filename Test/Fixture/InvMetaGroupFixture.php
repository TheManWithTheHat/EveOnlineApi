<?php
/**
 * InvMetaGroupFixture
 *
 */
class InvMetaGroupFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invMetaGroups';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'metaGroupID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'metaGroupName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'iconID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'metaGroupID', 'unique' => 1), 'iconID' => array('column' => 'iconID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'metaGroupID' => 1,
			'metaGroupName' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'iconID' => 1
		),
	);
}
