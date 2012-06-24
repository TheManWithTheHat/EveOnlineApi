<?php
App::uses('RamActivity', 'EveOnlineApi.Model');

/**
 * RamActivity Test Case
 *
 */
class RamActivityTestCase extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RamActivity = ClassRegistry::init('RamActivity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RamActivity);

		parent::tearDown();
	}

}
