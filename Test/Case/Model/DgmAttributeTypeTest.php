<?php
App::uses('DgmAttributeType', 'EveOnlineApi.Model');

/**
 * DgmAttributeType Test Case
 *
 */
class DgmAttributeTypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.dgm_attribute_type');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DgmAttributeType = ClassRegistry::init('DgmAttributeType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DgmAttributeType);

		parent::tearDown();
	}

}
