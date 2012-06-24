<?php
App::uses('EveUnit', 'EveOnlineApi.Model');

/**
 * EveUnit Test Case
 *
 */
class EveUnitTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.eve_unit');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EveUnit = ClassRegistry::init('EveUnit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EveUnit);

		parent::tearDown();
	}

}
