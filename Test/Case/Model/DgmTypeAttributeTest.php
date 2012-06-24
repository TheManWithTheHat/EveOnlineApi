<?php
App::uses('DgmTypeAttribute', 'EveOnlineApi.Model');

/**
 * DgmTypeAttribute Test Case
 *
 */
class DgmTypeAttributeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.dgm_type_attribute');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DgmTypeAttribute = ClassRegistry::init('DgmTypeAttribute');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DgmTypeAttribute);

		parent::tearDown();
	}

}
