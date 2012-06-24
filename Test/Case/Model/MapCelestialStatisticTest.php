<?php
App::uses('MapCelestialStatistic', 'EveOnlineApi.Model');

/**
 * MapCelestialStatistic Test Case
 *
 */
class MapCelestialStatisticTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.map_celestial_statistic');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MapCelestialStatistic = ClassRegistry::init('MapCelestialStatistic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MapCelestialStatistic);

		parent::tearDown();
	}

}
