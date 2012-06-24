<?php
App::uses('CrpNPCCorporation', 'EveOnlineApi.Model');

/**
 * CrpNPCCorporation Test Case
 *
 */
class CrpNPCCorporationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.crp_n_p_c_corporation');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CrpNPCCorporation = ClassRegistry::init('CrpNPCCorporation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CrpNPCCorporation);

		parent::tearDown();
	}

}
