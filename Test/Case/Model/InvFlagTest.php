<?php
App::uses('InvFlag', 'EveOnlineApi.Model');

/**
 * InvFlag Test Case
 *
 */
class InvFlagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_flag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvFlag = ClassRegistry::init('InvFlag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvFlag);

		parent::tearDown();
	}

}
