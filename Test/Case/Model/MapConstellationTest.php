<?php
App::uses('MapConstellation', 'EveOnlineApi.Model');

/**
 * MapConstellation Test Case
 *
 */
class MapConstellationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.map_constellation');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MapConstellation = ClassRegistry::init('MapConstellation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapConstellation);

		parent::tearDown();
	}

}
