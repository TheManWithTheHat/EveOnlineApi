<?php
/**
 * CrpNPCCorporationResearchFieldFixture
 *
 */
class CrpNPCCorporationResearchFieldFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'crpNPCCorporationResearchFields';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'skillID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'corporationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'indexes' => array('PRIMARY' => array('column' => array('skillID', 'corporationID'), 'unique' => 1), 'corporationID' => array('column' => 'corporationID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'skillID' => 1,
			'corporationID' => 1
		),
	);
}
