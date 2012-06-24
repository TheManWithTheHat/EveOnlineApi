<?php
App::uses('CrpNPCDivision', 'EveOnlineApi.Model');

/**
 * CrpNPCDivision Test Case
 *
 */
class CrpNPCDivisionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.crp_n_p_c_division');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CrpNPCDivision = ClassRegistry::init('CrpNPCDivision');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CrpNPCDivision);

		parent::tearDown();
	}

}
