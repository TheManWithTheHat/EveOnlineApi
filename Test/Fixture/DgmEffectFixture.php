<?php
/**
 * DgmEffectFixture
 *
 */
class DgmEffectFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'dgmEffects';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'effectID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary'),
		'effectName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 400, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'effectCategory' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'preExpression' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'postExpression' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'guid' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'iconID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'isOffensive' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'isAssistance' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'durationAttributeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'trackingSpeedAttributeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'dischargeAttributeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'rangeAttributeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'falloffAttributeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'disallowAutoRepeat' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'published' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'displayName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'isWarpSafe' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'rangeChance' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'electronicChance' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'propulsionChance' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'distribution' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'sfxName' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'npcUsageChanceAttributeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'npcActivationChanceAttributeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'fittingUsageChanceAttributeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'effectID', 'unique' => 1), 'durationAttributeID' => array('column' => 'durationAttributeID', 'unique' => 0), 'trackingSpeedAttributeID' => array('column' => 'trackingSpeedAttributeID', 'unique' => 0), 'dischargeAttributeID' => array('column' => 'dischargeAttributeID', 'unique' => 0), 'rangeAttributeID' => array('column' => 'rangeAttributeID', 'unique' => 0), 'falloffAttributeID' => array('column' => 'falloffAttributeID', 'unique' => 0), 'npcUsageChanceAttributeID' => array('column' => 'npcUsageChanceAttributeID', 'unique' => 0), 'npcActivationChanceAttributeID' => array('column' => 'npcActivationChanceAttributeID', 'unique' => 0), 'fittingUsageChanceAttributeID' => array('column' => 'fittingUsageChanceAttributeID', 'unique' => 0), 'iconID' => array('column' => 'iconID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'effectID' => 1,
			'effectName' => 'Lorem ipsum dolor sit amet',
			'effectCategory' => 1,
			'preExpression' => 1,
			'postExpression' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'guid' => 'Lorem ipsum dolor sit amet',
			'iconID' => 1,
			'isOffensive' => 1,
			'isAssistance' => 1,
			'durationAttributeID' => 1,
			'trackingSpeedAttributeID' => 1,
			'dischargeAttributeID' => 1,
			'rangeAttributeID' => 1,
			'falloffAttributeID' => 1,
			'disallowAutoRepeat' => 1,
			'published' => 1,
			'displayName' => 'Lorem ipsum dolor sit amet',
			'isWarpSafe' => 1,
			'rangeChance' => 1,
			'electronicChance' => 1,
			'propulsionChance' => 1,
			'distribution' => 1,
			'sfxName' => 'Lorem ipsum dolor ',
			'npcUsageChanceAttributeID' => 1,
			'npcActivationChanceAttributeID' => 1,
			'fittingUsageChanceAttributeID' => 1
		),
	);
}
