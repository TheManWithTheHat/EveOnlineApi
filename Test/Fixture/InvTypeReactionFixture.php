<?php
/**
 * InvTypeReactionFixture
 *
 */
class InvTypeReactionFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invTypeReactions';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'reactionTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'input' => array('type' => 'boolean', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'typeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'quantity' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'indexes' => array('PRIMARY' => array('column' => array('reactionTypeID', 'input', 'typeID'), 'unique' => 1), 'typeID' => array('column' => 'typeID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'reactionTypeID' => 1,
			'input' => 1,
			'typeID' => 1,
			'quantity' => 1
		),
	);
}
