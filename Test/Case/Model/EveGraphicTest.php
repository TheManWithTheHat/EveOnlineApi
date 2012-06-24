<?php
App::uses('EveGraphic', 'EveOnlineApi.Model');

/**
 * EveGraphic Test Case
 *
 */
class EveGraphicTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.eve_graphic');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EveGraphic = ClassRegistry::init('EveGraphic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EveGraphic);

		parent::tearDown();
	}

}
