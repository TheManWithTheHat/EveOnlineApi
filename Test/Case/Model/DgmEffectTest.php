<?php
App::uses('DgmEffect', 'EveOnlineApi.Model');

/**
 * DgmEffect Test Case
 *
 */
class DgmEffectTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.dgm_effect');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DgmEffect = ClassRegistry::init('DgmEffect');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DgmEffect);

		parent::tearDown();
	}

}
