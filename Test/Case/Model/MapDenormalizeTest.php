<?php
App::uses('MapDenormalize', 'EveOnlineApi.Model');

/**
 * MapDenormalize Test Case
 *
 */
class MapDenormalizeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.map_denormalize');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MapDenormalize = ClassRegistry::init('MapDenormalize');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapDenormalize);

		parent::tearDown();
	}

}
