<?php
App::uses('InvBlueprintType', 'EveOnlineApi.Model');

/**
 * InvBlueprintType Test Case
 *
 */
class InvBlueprintTypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_blueprint_type');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvBlueprintType = ClassRegistry::init('InvBlueprintType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvBlueprintType);

		parent::tearDown();
	}

}
