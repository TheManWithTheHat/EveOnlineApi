<?php
/**
 * InvMetaTypeFixture
 *
 */
class InvMetaTypeFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invMetaTypes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'typeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'parentTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'metaGroupID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'typeID', 'unique' => 1), 'parentTypeID' => array('column' => 'parentTypeID', 'unique' => 0), 'metaGroupID' => array('column' => 'metaGroupID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'typeID' => 1,
			'parentTypeID' => 1,
			'metaGroupID' => 1
		),
	);
}
