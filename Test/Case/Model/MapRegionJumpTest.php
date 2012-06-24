<?php
App::uses('MapRegionJump', 'EveOnlineApi.Model');

/**
 * MapRegionJump Test Case
 *
 */
class MapRegionJumpTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.map_region_jump');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MapRegionJump = ClassRegistry::init('MapRegionJump');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapRegionJump);

		parent::tearDown();
	}

}
