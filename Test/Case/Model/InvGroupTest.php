<?php
App::uses('InvGroup', 'EveOnlineApi.Model');

/**
 * InvGroup Test Case
 *
 */
class InvGroupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvGroup = ClassRegistry::init('InvGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvGroup);

		parent::tearDown();
	}

}
