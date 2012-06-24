<?php
App::uses('CrtRecommendation', 'EveOnlineApi.Model');

/**
 * CrtRecommendation Test Case
 *
 */
class CrtRecommendationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.crt_recommendation');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CrtRecommendation = ClassRegistry::init('CrtRecommendation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CrtRecommendation);

		parent::tearDown();
	}

}
