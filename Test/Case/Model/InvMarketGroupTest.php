<?php
App::uses('InvMarketGroup', 'EveOnlineApi.Model');

/**
 * InvMarketGroup Test Case
 *
 */
class InvMarketGroupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_market_group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvMarketGroup = ClassRegistry::init('InvMarketGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvMarketGroup);

		parent::tearDown();
	}

}
