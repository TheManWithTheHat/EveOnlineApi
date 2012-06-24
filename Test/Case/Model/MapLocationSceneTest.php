<?php
App::uses('MapLocationScene', 'EveOnlineApi.Model');

/**
 * MapLocationScene Test Case
 *
 */
class MapLocationSceneTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.map_location_scene');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MapLocationScene = ClassRegistry::init('MapLocationScene');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapLocationScene);

		parent::tearDown();
	}

}
