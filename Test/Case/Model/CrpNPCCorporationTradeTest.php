<?php
App::uses('CrpNPCCorporationTrade', 'EveOnlineApi.Model');

/**
 * CrpNPCCorporationTrade Test Case
 *
 */
class CrpNPCCorporationTradeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.crp_n_p_c_corporation_trade');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CrpNPCCorporationTrade = ClassRegistry::init('CrpNPCCorporationTrade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CrpNPCCorporationTrade);

		parent::tearDown();
	}

}
