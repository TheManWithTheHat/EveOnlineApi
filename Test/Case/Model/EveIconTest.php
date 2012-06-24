<?php
App::uses('EveIcon', 'EveOnlineApi.Model');

/**
 * EveIcon Test Case
 *
 */
class EveIconTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.eve_icon');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EveIcon = ClassRegistry::init('EveIcon');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EveIcon);

		parent::tearDown();
	}

}
