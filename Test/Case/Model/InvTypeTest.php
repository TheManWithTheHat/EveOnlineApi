<?php
App::uses('InvType', 'EveOnlineApi.Model');

/**
 * InvType Test Case
 *
 */
class InvTypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_type');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvType = ClassRegistry::init('InvType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvType);

		parent::tearDown();
	}

}
