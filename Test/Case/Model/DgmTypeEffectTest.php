<?php
App::uses('DgmTypeEffect', 'EveOnlineApi.Model');

/**
 * DgmTypeEffect Test Case
 *
 */
class DgmTypeEffectTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.dgm_type_effect');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DgmTypeEffect = ClassRegistry::init('DgmTypeEffect');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DgmTypeEffect);

		parent::tearDown();
	}

}
