<?php
App::uses('InvControlTowerResourcePurpose', 'EveOnlineApi.Model');

/**
 * InvControlTowerResourcePurpose Test Case
 *
 */
class InvControlTowerResourcePurposeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_control_tower_resource_purpose');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvControlTowerResourcePurpose = ClassRegistry::init('InvControlTowerResourcePurpose');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvControlTowerResourcePurpose);

		parent::tearDown();
	}

}
