<?php
App::uses('MapLandmark', 'EveOnlineApi.Model');

/**
 * MapLandmark Test Case
 *
 */
class MapLandmarkTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.map_landmark');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MapLandmark = ClassRegistry::init('MapLandmark');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapLandmark);

		parent::tearDown();
	}

}
