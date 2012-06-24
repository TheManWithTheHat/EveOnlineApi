<?php
App::uses('EveName', 'EveOnlineApi.Model');

/**
 * EveName Test Case
 *
 */
class EveNameTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.eve_name');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EveName = ClassRegistry::init('EveName');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EveName);

		parent::tearDown();
	}

}
