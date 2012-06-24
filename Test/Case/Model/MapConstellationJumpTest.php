<?php
App::uses('MapConstellationJump', 'EveOnlineApi.Model');

/**
 * MapConstellationJump Test Case
 *
 */
class MapConstellationJumpTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.map_constellation_jump');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MapConstellationJump = ClassRegistry::init('MapConstellationJump');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapConstellationJump);

		parent::tearDown();
	}

}
