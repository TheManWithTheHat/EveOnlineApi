<?php
/**
 * InvBlueprintTypeFixture
 *
 */
class InvBlueprintTypeFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'invBlueprintTypes';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'blueprintTypeID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'parentBlueprintTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'productTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'productionTime' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'techLevel' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'researchProductivityTime' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'researchMaterialTime' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'researchCopyTime' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'researchTechTime' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'productivityModifier' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'materialModifier' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'wasteFactor' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'maxProductionLimit' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'blueprintTypeID', 'unique' => 1), 'parentBlueprintTypeID' => array('column' => 'parentBlueprintTypeID', 'unique' => 0), 'productTypeID' => array('column' => 'productTypeID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'blueprintTypeID' => 1,
			'parentBlueprintTypeID' => 1,
			'productTypeID' => 1,
			'productionTime' => 1,
			'techLevel' => 1,
			'researchProductivityTime' => 1,
			'researchMaterialTime' => 1,
			'researchCopyTime' => 1,
			'researchTechTime' => 1,
			'productivityModifier' => 1,
			'materialModifier' => 1,
			'wasteFactor' => 1,
			'maxProductionLimit' => 1
		),
	);
}
