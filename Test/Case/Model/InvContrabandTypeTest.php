<?php
App::uses('InvContrabandType', 'EveOnlineApi.Model');

/**
 * InvContrabandType Test Case
 *
 */
class InvContrabandTypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_contraband_type');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvContrabandType = ClassRegistry::init('InvContrabandType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvContrabandType);

		parent::tearDown();
	}

}
