<?php
App::uses('InvTypeMaterial', 'EveOnlineApi.Model');

/**
 * InvTypeMaterial Test Case
 *
 */
class InvTypeMaterialTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_type_material');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvTypeMaterial = ClassRegistry::init('InvTypeMaterial');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvTypeMaterial);

		parent::tearDown();
	}

}
