<?php
App::uses('InvControlTowerResource', 'EveOnlineApi.Model');

/**
 * InvControlTowerResource Test Case
 *
 */
class InvControlTowerResourceTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_control_tower_resource');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvControlTowerResource = ClassRegistry::init('InvControlTowerResource');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvControlTowerResource);

		parent::tearDown();
	}

}
