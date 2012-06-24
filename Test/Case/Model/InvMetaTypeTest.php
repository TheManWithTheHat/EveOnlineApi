<?php
App::uses('InvMetaType', 'EveOnlineApi.Model');

/**
 * InvMetaType Test Case
 *
 */
class InvMetaTypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_meta_type');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvMetaType = ClassRegistry::init('InvMetaType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvMetaType);

		parent::tearDown();
	}

}
