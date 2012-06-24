<?php
App::uses('InvMetaGroup', 'EveOnlineApi.Model');

/**
 * InvMetaGroup Test Case
 *
 */
class InvMetaGroupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_meta_group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvMetaGroup = ClassRegistry::init('InvMetaGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvMetaGroup);

		parent::tearDown();
	}

}
