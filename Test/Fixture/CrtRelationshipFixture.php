<?php
/**
 * CrtRelationshipFixture
 *
 */
class CrtRelationshipFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'crtRelationships';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'relationshipID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'parentID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'parentTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'parentLevel' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'childID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'relationshipID', 'unique' => 1), 'crtRelationships_IX_child' => array('column' => 'childID', 'unique' => 0), 'crtRelationships_IX_parent' => array('column' => 'parentID', 'unique' => 0), 'parentTypeID' => array('column' => 'parentTypeID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'relationshipID' => 1,
			'parentID' => 1,
			'parentTypeID' => 1,
			'parentLevel' => 1,
			'childID' => 1
		),
	);
}
