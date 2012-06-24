<?php
App::uses('MapJump', 'EveOnlineApi.Model');

/**
 * MapJump Test Case
 *
 */
class MapJumpTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.map_jump');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MapJump = ClassRegistry::init('MapJump');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapJump);

		parent::tearDown();
	}

}
