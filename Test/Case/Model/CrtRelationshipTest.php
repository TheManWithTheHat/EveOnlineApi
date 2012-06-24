<?php
App::uses('CrtRelationship', 'EveOnlineApi.Model');

/**
 * CrtRelationship Test Case
 *
 */
class CrtRelationshipTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.crt_relationship');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CrtRelationship = ClassRegistry::init('CrtRelationship');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CrtRelationship);

		parent::tearDown();
	}

}
